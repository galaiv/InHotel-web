<?php



/*



Copyright (c) 2009 Anant Garg (anantgarg.com | inscripts.com)



This script may be used for non-commercial purposes only. For any

commercial purposes, please contact the author at 

anant.garg@inscripts.com



THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,

EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES

OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND

NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT

HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,

WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING

FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR

OTHER DEALINGS IN THE SOFTWARE.



*/



define ('DBPATH','localhost');

define ('DBUSER','newagesm_sme');

define ('DBPASS','KdUks.GbieWb');

define ('DBNAME','newagesm_inhotel');



session_start();



global $dbh;

$dbh = mysql_connect(DBPATH,DBUSER,DBPASS);

mysql_selectdb(DBNAME,$dbh);



if ($_GET['action'] == "chatheartbeat") { chatHeartbeat(); } 

if ($_GET['action'] == "sendchat") { sendChat(); } 

if ($_GET['action'] == "closechat") { closeChat(); } 

if ($_GET['action'] == "startchatsession") { startChatSession(); }

if ($_GET['action'] == "getchat") { getchat(); } 

 



if (!isset($_SESSION['chatHistory'])) {

	$_SESSION['chatHistory'] = array();	

}



if (!isset($_SESSION['openChatBoxes'])) {

	$_SESSION['openChatBoxes'] = array();	

}

function getchat()

{

	$chat_userid = $_POST['chat_userid'];

	$to = $_SESSION['userid'];

	$to_user = $_SESSION['username'];

	$sql = "select c.*,imm.first_name as send_user,im.first_name as to_user from chat c   

	        left join in_member_master imm on imm.user_id=c.to 

			left join in_member_master im on im.user_id=c.from 

	where ((c.to = '".mysql_real_escape_string($_SESSION['userid'])."' AND c.from = '4' AND c.sen_removed = 'N') or (c.to = '4' AND c.from = '".mysql_real_escape_string($_SESSION['userid'])."' AND c.sen_removed = 'N')) order by c.id ASC";

	

	$query = mysql_query($sql); 

	$items = '';



	$chatBoxes = array();

		while ($chat = mysql_fetch_array($query)) {

		if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {

			$items = $_SESSION['chatHistory'][$chat['from']];

		}

  }

  		$chat['message'] = sanitize($chat['message']);



    

}

function chatHeartbeat() {

	$to = $_SESSION['userid'];

	$to_user = $_SESSION['username'];

	$sql = "select c.*,imm.first_name as send_user from chat c   

	        left join in_member_master imm on imm.user_id=c.from 

	where ((c.to = '".mysql_real_escape_string($_SESSION['userid'])."' AND c.rec_removed = 'N' AND recd = 0)) order by c.id ASC";

	

	$query = mysql_query($sql); 

	$items = '';



	$chatBoxes = array();

//print_r(mysql_fetch_array($query));exit;

	while ($chat = mysql_fetch_array($query)) {



		if (!isset($_SESSION['openChatBoxes'][$chat['from']]) && isset($_SESSION['chatHistory'][$chat['from']])) {

			$items = $_SESSION['chatHistory'][$chat['from']];

			$formid = $chat['from'];

		}



		$chat['message'] = sanitize($chat['message']);



		$items .= <<<EOD

					   {

			"s": "0",

			"f": "{$chat['send_user']}",

			"m": "{$chat['message']}",

			"t": "{$chat['from']}"

	   },

EOD;



	if (!isset($_SESSION['chatHistory'][$chat['from']])) {

		$_SESSION['chatHistory'][$chat['from']] = '';

	}



	$_SESSION['chatHistory'][$chat['from']] .= <<<EOD

						   {

			"s": "0",

			"f": "{$chat['send_user']}",

			"m": "{$chat['message']}",

			"t": "{$chat['from']}"

	   },

EOD;

		

		unset($_SESSION['tsChatBoxes'][$chat['from']]);

		$_SESSION['openChatBoxes'][$chat['from']] = $chat['sent'];

	}



	if (!empty($_SESSION['openChatBoxes'])) {

	foreach ($_SESSION['openChatBoxes'] as $chatbox => $time) {

		

		$sql1 = "select first_name from in_member_master where in_member_master.user_id = '".$chatbox."'";

			$query1 = mysql_query($sql1);

	 while ($row = mysql_fetch_assoc($query1)) {

    $chatbox1 = $row['first_name'];

}

	

	

		if (!isset($_SESSION['tsChatBoxes'][$chatbox])) {

			$now = time()-strtotime($time);

			$time = date('g:iA ', strtotime($time));



			$message = "Sent at $time";

			if ($now > 180) {

				$items .= <<<EOD

{

"s": "2",

"f": "$chatbox1",

"m": "{$message}",

"t": "{$chatbox}"



},

EOD;



	if (!isset($_SESSION['chatHistory'][$chatbox])) {

		$_SESSION['chatHistory'][$chatbox] = '';

	}



	$_SESSION['chatHistory'][$chatbox] .= <<<EOD

		{

"s": "2",

"f": "$chatbox1",

"m": "{$message}",

"t": "{$chatbox}"



},

EOD;

			$_SESSION['tsChatBoxes'][$chatbox] = 1;

		}

		}

	}

}



	$sql = "update chat set recd = 1 where chat.to = '".mysql_real_escape_string($_SESSION['userid'])."' and recd = 0";

	$query = mysql_query($sql);



	if ($items != '') {

		$items = substr($items, 0, -1);

	}

header('Content-type: application/json');

?>

{

		"items": [

			<?php echo $items;?>

        ]

}



<?php

			exit(0);

}



function chatBoxSession($chatbox) {

	

	$items = '';

	

	if (isset($_SESSION['chatHistory'][$chatbox])) {

		$items = $_SESSION['chatHistory'][$chatbox];

	}



	return $items;

}



function startChatSession() {

	$items = '';

	if (!empty($_SESSION['openChatBoxes'])) {

		foreach ($_SESSION['openChatBoxes'] as $chatbox => $void) {

			$items .= chatBoxSession($chatbox);

		}

	}





	if ($items != '') {

		$items = substr($items, 0, -1);

	}



header('Content-type: application/json');

?>

{

		"username": "<?php echo $_SESSION['username'];?>",

		"userid": "<?php echo $_SESSION['userid'];?>",

		"items": [

			<?php echo $items;?>

        ]

}



<?php





	exit(0);

}

 

function sendChat() {   

	$from = $_POST['from'];

    $to = $_POST['to'];

	$message = $_POST['message'];

								

	$sql2 = "select first_name from in_member_master where in_member_master.user_id = '".$to."'";

			$query2 = mysql_query($sql2);

	 while ($row = mysql_fetch_assoc($query2)) {

    $user1 = $row['first_name'];

	}

	//print_r($_SESSION);exit;

	

	$_SESSION['openChatBoxes'][$_POST['to']] = date('Y-m-d H:i:s', time());

	

	$messagesan = sanitize($message); 



	if (!isset($_SESSION['chatHistory'][$_POST['to']])) {

		$_SESSION['chatHistory'][$_POST['to']] = '';

	}

	$_SESSION['chatHistory'][$_POST['to']] .= <<<EOD

					   {  

			"s": "1",

			"f": "{$user1}", 

			"m": "{$messagesan}",

			"t": "{$to}"

	   },

EOD;





	unset($_SESSION['tsChatBoxes'][$_POST['to']]);



	$sql = "insert into chat (chat.from,chat.to,message,sent) values ('".mysql_real_escape_string($from)."', '".mysql_real_escape_string($to)."','".mysql_real_escape_string($message)."',NOW())";//echo $sql;exit;

	$query = mysql_query($sql); 

							

	$sql1 = "select first_name from in_member_master where in_member_master.user_id = '".$from."'";

			$query1 = mysql_query($sql1);

	 while ($row = mysql_fetch_assoc($query1)) {

   $user = $row['first_name'];

} echo $user;

	exit(0);

}



function closeChat() { 



	unset($_SESSION['openChatBoxes'][$_POST['chatbox']]);

	

	echo "1";

	exit(0); 

}



function sanitize($text) {

	$text = htmlspecialchars($text, ENT_QUOTES);

	$text = str_replace("\n\r","\n",$text);

	$text = str_replace("\r\n","\n",$text);

	$text = str_replace("\n","<br>",$text);

	return $text;

}