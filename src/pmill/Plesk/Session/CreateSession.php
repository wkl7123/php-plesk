<?php
namespace pmill\Plesk\Session;

use pmill\Plesk\BaseRequest;
use pmill\Plesk\ApiRequestException;
class CreateSession extends BaseRequest
{
    /**
     * @var string
     */
    public $xml_packet = <<<EOT
<?xml version="1.0" encoding="UTF-8"?>
<packet version="1.6.3.3">
  <server>
    <create_session>
      <login>{LOGIN}</login>
      <data>
        <user_ip>{USER_IP}</user_ip>
        <source_server>{SOURCE_SERVER}</source_server>
      </data>
    </create_session>
  </server>
</packet>
EOT;

    
    protected $default_params = [
        'source_server' => '',
    ];

    /**
     * @param $xml
     * @return bool
     * @throws ApiRequestException
     */
    protected function processResponse($xml)
    {
        $result = $xml->server->create_session->result;
        if ((string)$result->status == 'error') {
            throw new ApiRequestException((string)$result->errtext);
        }
        return (string)$result->id;
    }
}
