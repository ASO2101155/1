<?php
    require_once('../../vendor/autoload.php');
    use DateTime as DateTime;
    use onesignal\client\api\DefaultApi;
    use onesignal\client\Configuration;
    use onesignal\client\model\GetNotificationRequestBody;
    use onesignal\client\model\Notification;
    use onesignal\client\model\StringMap;
    use onesignal\client\model\Player;
    use onesignal\client\model\UpdatePlayerTagsRequestBody;
    use onesignal\client\model\ExportPlayersRequestBody;
    use onesignal\client\model\Segment;
    use onesignal\client\model\FilterExpressions;
    use PHPUnit\Framework\TestCase;
    use GuzzleHttp\Client;
    const APP_ID = '6e8a7b28-bfdf-4db5-9cc4-e43213398d68';
    const APP_KEY_TOKEN = 'NzRmNmEzNmQtMjViYy00ZDkxLTk2YmEtMWM0NWVjZWZjY2Nm';
    const USER_KEY_TOKEN = 'ZmIxMDIxOTctMmZhMC00N2Q4LWIyYzMtZDM2NzhlNjY5MmJk';
    class NoticeSend {
        private $config;
        private $apiInstance;

        public function __construct() {
            $this->config = Configuration::getDefaultConfiguration()
            ->setAppKeyToken(APP_KEY_TOKEN)
            ->setUserKeyToken(USER_KEY_TOKEN);

            $this->apiInstance = new DefaultApi(
                new Client(),
                $this->config
            );
        }

        private function createNotification($Content, $external_user_id): Notification {
            $content = new StringMap();
            $content->setEn($Content);
            
            $notification = new Notification();
            $notification->setAppId(APP_ID);
            $notification->setContents($content);
            $notification->setIncludeExternalUserIds([$external_user_id]);
            return $notification;
        }

        public function sendEventNotificaion($content, $external_user_id) {
            $notification = $this->createNotification($content, $external_user_id);
            try {
                $result = $this->apiInstance->createNotification($notification);
                return $result;
            } catch (Exception $e) {
                return 'Exception when calling DefaultApi->createNotification: '. $e->getMessage(). PHP_EOL;
            }
        }

        public function sendEventReplyNotificaion($content, $external_user_id) {
            $notification = $this->createNotification($content, $external_user_id);
            try {
                $result = $this->apiInstance->createNotification($notification);
                return $result;
            } catch (Exception $e) {
                return 'Exception when calling DefaultApi->createNotification: '. $e->getMessage(). PHP_EOL;
            }
        }
    }
?>