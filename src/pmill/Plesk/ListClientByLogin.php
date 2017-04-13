<?php
namespace pmill\Plesk;

class ListClientByLogin extends BaseRequest
{
    /**
     * @var string
     */
    public $xml_packet = <<<EOT
<?xml version="1.0"?>
<packet version="1.6.0.0">
<client>
    <get>
        <filter>
            <login>{LOGIN}</login>
        </filter>
        <dataset>
			<gen_info/>
			<stat/>
		</dataset>
    </get>
</client>
</packet>
EOT;

    /**
     * @param $xml
     * @return array
     */
    protected function processResponse($xml)
    {
        $result = [];

        for ($i = 0; $i < count($xml->client->get->result); $i++) {
            $client = $xml->client->get->result[$i];
            $result[] = [
                'id' => (string)$client->id,
                'status' => (string)$client->status,
            ];
        }

        return $result;
    }
}

