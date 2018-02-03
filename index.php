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


require 'vendor/autoload.php';

$client = new Zelenin\Telegram\Bot\Api('484858770:AAHTXC1Ja6E77XEBVKxEfKLpuDjzxi0cbxc'); // Set your access token
$url = 'https://cryptocrushbot.herokuapp.com/'; // URL RSS feed
$update = json_decode(file_get_contents('php://input'));
// // Using DB::selectChats method.
// public static function getUsername($user_id)
// {
//     if ($chats = DB::selectChats(['chat_id' => $user_id])) {
//         $chat = reset($chats);
//         return isset($chat['username']) ? $chat['username'] : false;
//     }

//     return false;
// }
//your app
try {

    if($update->message->text == '/deal')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
        	'chat_id' => $update->message->chat->id,
        	'text' => "A deal has started
                       \n Main Escrow Agent - @VEEEGEEE  
                       \n Escrow Agent - @Mr_Anderson26
                       \n Escrow Agent - @CryptoVenturesMike  
                       \n Escrow Agent - @jmoney90 
                       \n Escrow Agent - @gino1000 
                       \n Escrow Agent - @p_mn3y 
                       \n Escrow Agent - 🛑@CCE18 3ETH MAX EACH DEAL🛑"
     	]);
    }
    else if($update->message->text == '/stop_dealing')
    {
    	$response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
    	$response = $client->sendMessage([
    		'chat_id' => $update->message->chat->id,
    		'text' => "One of the party denies the deal, return funds if sended"
    		]);

    }

    else if($update->message->text == '/start')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Hello $username, Do you want to make a /deal?"
            ]);

    }

    else if($update->message->text == '/b_received')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "The money of the buyer has been received, please seller proceed"
            ]);

    }

    else if($update->message->text == '/introduce')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Hello @Everyone, I'm here to help with Trading and Dealing"
            ]);

    }


    else if($update->message->text == '/s_sent')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Seller has sent coins, buyer stay tuned, check your wallet please"
            ]);

    }

    else if($update->message->text == '/deal_succeed')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Deal has finished succesfully, congrats to the parties involved"
            ]);

    }

    else if($update->message->text == '/help')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "List of commands :
            \n /deal -> a deal has started 
            \n /stop_dealing -> One of the parties denies the deal 
            \n /b_received -> The money of the buyer has been received, please seller proceed
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
    		'text' => "Hello @Everyone, I'm here to help with Trading and Dealing"
    		]);
    }
else if($update->message->text == '/stop_dealing@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "One of the party denies the deal, return funds if sended"
            ]);

    }

    else if($update->message->text == '/start@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Hello $username, Do you want to make a /deal?"
            ]);

    }

    else if($update->message->text == '/b_received@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "The money of the buyer has been received, please seller proceed"
            ]);

    }

    else if($update->message->text == '/introduce@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Hello @Everyone, I'm here to help with Trading and Dealing"
            ]);

    }


    else if($update->message->text == '/s_sent@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Seller has sent coins, buyer stay tuned, check your wallet please"
            ]);

    }

    else if($update->message->text == '/deal_succeed@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Deal has finished succesfully, congrats to the parties involved"
            ]);

    }

    else if($update->message->text == '/help@CrushDealerBot')
    {
        $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "List of commands :
            \n /deal -> a deal has started 
            \n /stop_dealing -> One of the parties denies the deal 
            \n /b_received -> The money of the buyer has been received, please seller proceed
            \n /s_sent -> Seller has sent coins, buyer stay tuned 
            \n/deal_succeed -> Deal has finished succesfully, congrats
            \n/help -> Shows list of available commands"
            ]);

    }

    else if($update->message->text == '/latest')
    {
            Feed::$cacheDir     = __DIR__ . '/cache';
            Feed::$cacheExpire  = '5 hours';
            $rss        = Feed::loadRss($url);
            $items      = $rss->item;
            $lastitem   = $items[0];
            $lastlink   = $lastitem->link;
            $lasttitle  = $lastitem->title;
            $message = $lasttitle . " \n ". $lastlink;
            $response = $client->sendChatAction(['chat_id' => $update->message->chat->id, 'action' => 'typing']);
            $response = $client->sendMessage([
                    'chat_id' => $update->message->chat->id,
                    'text' => $message
                ]);

    }
    else
    {
        $response = $client->sendChatAction(['chat_id@CrushDealerBot' => $update->message->chat->id, 'action' => 'typing']);
        $response = $client->sendMessage([
            'chat_id' => $update->message->chat->id,
            'text' => "Invalid command, please use /help to get list of available commands"
            ]);
    }
} catch (\Zelenin\Telegram\Bot\NotOkException $e) {

    //echo error message ot log it
    //echo $e->getMessage();

}
