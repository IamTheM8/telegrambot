<?php

/*
* This file is part of GeeksWeb Bot (GWB).
*
* GeeksWeb Bot (GWB) is free software; you can redistribute it and/or modify
* it under the terms of the GNU General Public License version 3
* as published by the Free Software Foundation.
* 
* GeeksWeb Bot (GWB) is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
* GNU General Public License for more details.  <http://www.gnu.org/licenses/>
*
* Author(s):
*
* © 2015 Kasra Madadipouya <kasra@madadipouya.com>
*
*/


// /deal - Users start the dealing process
// /stop_dealing - Users didn't agree
// /b_received - Buyer sent money
// /s_sent - Seller sent
// /deal_succeed - Every party received their money
// /seller_address - Seller address
// /buyer_address - Buyer address
// /help - if you need to see commands


require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('541832521:AAFRluNtyIWIAAbOZNHBX8n54X7nIKCZp8w'); // Set your access token
$url = 'https://cryptocrushbot.herokuapp.com/'; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));

//your app
try {

    if($update->message->text == '/deal')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "A deal has started"
     	]);
    }
    else if($update->message->text == '/stop_dealing')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "One of the party denies the deal"
    		]);

    }

    else if($update->message->text == '/b_received')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "The money of the buyer has been recieved, please seller proceed"
            ]);

    }


    else if($update->message->text == '/s_sent')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Seller has sent coins, buyer stay tuned"
            ]);

    }

    else if($update->message->text == '/deal_succeed')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Deal has finished succesfully, congrats"
            ]);

    }

    else if($update->message->text == '/help')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "List of commands :
            \n /deal -> a deal has started 
            \n /stop_dealing -> One of the party denies the deal 
            \n /b_received -> The money of the buyer has been recieved, please seller proceed
            \n /s_sent -> Seller has sent coins, buyer stay tuned 
            \n/deal_succeed -> Deal has finished succesfully, congrats
            \n/help -> Shows list of available commands"
            ]);

    }

    else if($update->message->text == '/latest')
    {
    		Feed::$cacheDir 	= __DIR__ . '/cache';
			Feed::$cacheExpire 	= '5 hours';
			$rss 		= Feed::loadRss($url);
			$items 		= $rss->item;
			$lastitem 	= $items[0];
			$lastlink 	= $lastitem->link;
			$lasttitle 	= $lastitem->title;
			$message = $lasttitle . " \n ". $lastlink;
			$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
			$response = $client->sendMessage([
					'chat_id' => $update->message->chat->id,
					'text' => $message
				]);

    }
    else
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "Invalid command, please use /help to get list of available commands"
    		]);
    }

} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
