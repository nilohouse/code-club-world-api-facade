<?php

class ClubControllerTest extends TestCase
{
    public function testCreateClubConfigs()
    {
        $response = $this->call('POST', '/create-club', [ 'clubData' => 
        	[
        		'name' => 'testing',
        		'perc_boys' => 50,
        		'perc_girls' => 50,
        		'size' => 10,
        		'contact_name' => 'Felipe Fernandes',
        		'contact_email' => 'ff@test.com',
        		'contact_skype' => 'ff_fake_skype',
        		'venue_name' => 'API integration test',
        		'venue_url' => 'http://codeclub.org.br',
        		'address_1' => 'Rua Voluntarios da Patria, 301',
        		'address_2' => 'Sala 402',
        		'city' => 'Rio de Janeiro',
        		'postcode' => ' 2227000',
        		'region' => 'Rio de Janeiro',
        		'latitude' => '-22.9522940',
        		'longitude' => '-43.1867464'
        	] 
        ]);

        $this->assertEquals(200, $response->status());
    }
}
