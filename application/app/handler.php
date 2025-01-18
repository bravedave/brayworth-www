<?php
/*
 * David Bray
 * BrayWorth Pty Ltd
 * e. david@brayworth.com.au
 *
 * MIT License
 *
*/

use bravedave\dvc\{http, json, logger, Request, sendmail, ServerRequest, sys};
use Symfony\Component\Mime\Address;

abstract class handler {

  protected static function _russian($s) {

    $len = strlen(trim($s, ' ?.,!'));
    if ($len > 0) {

      $res = preg_match_all('/[А-Яа-яЁё]/u', $s);
      return round($res / $len, 2);
    }

    return $len;
  }

  protected static function ServerIsLocal(ServerRequest $request) {

    $psr = $request();

    /** @var \Psr\Http\Message\ServerRequestInterface $psr */
    $sv = $psr->getServerParams();
    return (($sv['SERVER_NAME'] ?? '') == 'localhost');
  }

  protected static function getRemoteIP(ServerRequest $request): string {

    // https://stackoverflow.com/questions/1634782/what-is-the-most-accurate-way-to-retrieve-a-users-correct-ip-address-in-php
    foreach (
      [
        'HTTP_CLIENT_IP',
        'HTTP_X_FORWARDED_FOR',
        'HTTP_X_FORWARDED',
        'HTTP_X_CLUSTER_CLIENT_IP',
        'HTTP_FORWARDED_FOR',
        'HTTP_FORWARDED',
        'REMOTE_ADDR'
      ] as $key
    ) {
      if (array_key_exists($key, $_SERVER) === true) {

        foreach (explode(',', $_SERVER[$key]) as $ip) {

          $ip = trim($ip); // just to be safe
          if (self::ServerIsLocal($request)) {

            if (filter_var($ip, FILTER_VALIDATE_IP) !== false) {
              // logger::info( sprintf('<%s> %s', $ip, __METHOD__));
              return $ip;
            }
          } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_RES_RANGE) !== false) {

            return $ip;
          }
        }
      }
    }

    return '0.0.0.0';
  }

  public static function sendMessage0(ServerRequest $request): bool {

    $soz = $request('soz');
    if ('accepted' == $soz) {

      $_comments = $request('comments');
      /*--- ---[ruskies]--- ---*/
      $pr = self::_russian($_comments);
      /*--- ---[ruskies]--- ---*/

      $contactName = $request('contactName');
      $email = $request('email');

      $comments = sprintf('%s%s%sIP : %s', $_comments, PHP_EOL, PHP_EOL, Request::get()->getRemoteIP());
      if ($pr > .3) {
        $comments .= sprintf('%s%s russian', PHP_EOL, $pr * 100);
      }
      $comments .= sprintf('%suserAgent: %s', PHP_EOL, \userAgent::toString());

      $sendCopy = $request('sendCopy');

      $to = new Address(config::$SUPPORT_EMAIL, config::$SUPPORT_NAME);
      $replyTo = new Address($email, $contactName);

      //->cc('cc@example.com')
      //->bcc('bcc@example.com')
      //->priority(Email::PRIORITY_HIGH)

      $_email = sendmail::email()
        ->to($to)
        ->replyTo($replyTo)
        ->subject(sprintf('%s Contact : %s', config::$WEBNAME, $contactName))
        ->text($comments)
        ->html(sys::text2html($comments));

      if ($sendCopy == 'true') {

        $cc = new Address($email, $contactName);
        $_email->cc($cc);
      }

      try {

        sendmail::send($_email);
        return true;
      } catch (\Throwable $th) {

        logger::error($th->getMessage());
      }

      return false;
    } else {

      logger::error('soz not accepted');
    }

    return false;
  }

  public static function sendMessage(ServerRequest $request): json {

    $soz = $request('soz');
    if ('accepted' == $soz) {

      $_comments = $request('comments');
      /*--- ---[ruskies]--- ---*/
      $pr = self::_russian($_comments);
      /*--- ---[ruskies]--- ---*/

      $contactName = $request('contactName');
      $email = $request('email');

      $comments = [
        sprintf('from : %s &lt;%s&gt;', $contactName, $email),
        '---',
        $_comments,
        '---',
        sprintf('IP : %s', Request::get()->getRemoteIP())
      ];

      if ($pr > .3) $comments[] = sprintf('%s russian', $pr * 100);

      $comments[] = sprintf('userAgent: %s', \userAgent::toString());

      $comments = implode(PHP_EOL, $comments);

      $to = new Address(config::$SUPPORT_EMAIL, config::$SUPPORT_NAME);
      $replyTo = new Address($email, $contactName);

      //->cc('cc@example.com')
      //->bcc('bcc@example.com')
      //->priority(Email::PRIORITY_HIGH)
      // ->addFrom($replyTo)
      // ->replyTo($replyTo)

      $_email = sendmail::email()
        ->to($to)
        ->subject(sprintf('%s Contact : %s', config::$WEBNAME, $contactName))
        ->text($comments)
        ->html(sys::text2html($comments));

      $sendCopy = ('yes' == $request('sendCopy'));
      if ($sendCopy) {

        $cc = new Address($email, $contactName);
        $_email->cc($cc);
      }

      try {

        sendmail::send($_email);
      } catch (\Throwable $th) {

        return json::nak($th->getMessage());
      }

      return json::ack($request('action'));
    }
  }

  public static function verifyCaptcha(ServerRequest $request): json {

    $debug = false;
    // $debug = true;

    if (config::$captcha) {

      if ($token = $request('token')) {

        // $req = new \HttpPost('https://www.google.com/recaptcha/api/siteverify');
        $req = new http('https://www.google.com/recaptcha/api/siteverify');
        $req->setPostData([
          'secret' => config::$captcha->private,
          'response' => $token
        ], $useJson = false);

        $req->send();
        if ($response = $req->getResponseJSON()) {

          // logger::dump($response);

          if ($response->score > 0.5) {

            if ($debug) logger::debug(sprintf(
              '<pass reCaptcha : %s - %s> %s',
              $response->score,
              Request::get()->getRemoteIP(),
              __METHOD__
            ));

            return json::ack($request('action'))
              ->add('data', $response)
              ->add('soz', 'accepted');
          } else {

            logger::info(sprintf(
              '<Fail reCaptcha : %s - %s> %s',
              $response->score,
              Request::get()->getRemoteIP(),
              __METHOD__
            ));
          }

          return json::nak(sprintf('%s - bad rating', $request('action')));
        }

        return json::nak(sprintf('%s - bad response', $request('action')));
      }

      return json::nak(sprintf('%s - no token', $request('action')));
    }

    return json::nak(sprintf('%s - not configured', $request('action')));
  }
}
