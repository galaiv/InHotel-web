var params, chatUser, chatService, recipientID;

// Storage QB user ids by their logins
var users = {
	Quick: '999190',
	Blox: '978816'
};

$(document).ready(function() {
	// Web SDK initialization
	QB.init(QBAPP.appID, QBAPP.authKey, QBAPP.authSecret);
	
	// QuickBlox session creation
	QB.createSession(function(err, result) {
		if (err) {
			console.log(err.detail);
		} else {
			
			//$('.tooltip-title').tooltip();
		changeInputFileBehavior();
			//updateTime();
			
			// events
			$('body').on('click','.sessionButton',function(){
			login(); });
			//login();
			$('#logout').click(logout);
			$('#getmsg').click(getmsg);
			$('.attach').on('click', '.close', closeFile);
			$('.chat input:text').keydown(startTyping);
			$('.sendMessage').click(makeMessage);
		}
	});
	
	//window.onresize = function() {
		//changeHeightChatBlock();
	//};
});

function login() {
	//$('#loginForm button').hide();
	//$('#loginForm .progress').show();
    $('#loadingModal').modal('show');
	 params = {
		login: $('#user_id_qb').val(),
		password: $('#user_pass_qb').val()
	};
	// chat user authentication
	QB.login(params, function(err, result) {
		if (err) {
			onConnectFailed();
			console.log(err.detail);
		} else {
			chatUser = {
				id: result.id,
				login: params.login,
				pass: params.password
			};

				//$('#wrap').modal('show');
               
			//$('#wrap').modal('show');
			connectChat();
			

		}
	});
}
function getmsg() {
	//$('#loginForm button').hide();
	//$('#loginForm .progress').show();
	params = {limit: 50};
		
 chatService.getOnlineUsers(params, function(err, result) { //alert("hi");
	if (err) {
		//onConnectFailed();
		console.log(err.detail);
	} else {
		//  console.log(result);
		$('.chat .chat-user-list').html('<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> ' +result + '</li>');
		}
			});
 
}

function connectChat() {
	// set parameters of Chat object
	params = {
		onConnectFailed: onConnectFailed,
		onConnectSuccess: onConnectSuccess,
		onConnectClosed: onConnectClosed,
		onChatMessage: onChatMessage,
		onChatState: onChatState,

		debug: false
	};
	
	chatService = new QBChat(params);
	
	// connect to QB chat service
	chatService.connect(chatUser);
}

function startTyping() {
	if (chatUser.isTyping) return true;
	
	var message = {
		state: 'composing',
		//message: post,
		name: webuser,
		type: 'chat',
		extension: {
			nick: webuser
		}
	};
	
	// send 'composing' as chat state notification
	chatService.sendMessage(recipientID, message);
	
	chatUser.isTyping = true;
	setTimeout(stopTyping, 5 * 1000);
}

function stopTyping() {
	if (!chatUser.isTyping) return true;
	
	var message = {
		state: 'paused',
		type: 'chat',
		extension: {
			nick: webuser
		}
	};
	
	// send 'paused' as chat state notification
	chatService.sendMessage(recipientID, message);
	
	chatUser.isTyping = false;
}

function makeMessage(event) {
	event.preventDefault();
	var file, text;
	
	file = $('input:file')[0].files[0];
	text = $('.chat input:text').val();
	
	// check if user did not leave the empty field
	if (trim(text)) {
		
		// check if user has uploaded file
		if (file) {
			$('.chat .input-group').hide();
			$('.file-loading').show();
			closeFile();
			
			QB.content.createAndUpload({file: file, 'public': true}, function(err, result) {
				if (err) {
					console.log(err.detail);
				} else {
					$('.file-loading').hide();
					$('.chat .input-group').show();
					sendMessage(text, result.name, result.uid);
				}
			});
		} else {
			sendMessage(text);
		}
	}
}

function sendMessage(text, fileName, fileUID) {
	stopTyping();
	
	var message = {
		body: text,
		type: 'chat',
		name: webuser,
		extension: {
			nick: webuser,
			save_to_history: 1
		}
	};
	
	if (fileName && fileUID) {
		message.extension.fileName = fileName;
		message.extension.fileUID = fileUID;
	}
	
	// send user message
	chatService.sendMessage(recipientID, message);
	
	showMessage(message.body, new Date().toISOString(), message.extension);
	$('.chat input:text').val('');
   /* $.ajax({
					url: siteurl+"client/send_push_message",
					type: "POST",	
					data : {userid:userid,touserid:$("#to_user_id").val()},
					success: function(result){ 
					}
		   });*/
     $.ajax({
					url: siteurl+"client/send_push_message_and",
					type: "POST",	
					data : {userid:userid,touserid:$("#to_user_id").val(),message:text},
					success: function(result){ 
					}
		   });
}

function showMessage(body, time, extension) { //alert(extension.nick);
	var html, url, selector = $('.chat .messages');
	
    if($.trim(extension.nick) != "" && $.trim(extension.nick) != "null" && $.trim(extension.nick) !="undefined" )
	   user = extension.nick;
	else 
	   user = $("#to_user_name").val();
	//alert(to_user_name);
	//console.log(body);
	html = '<section class="message">';
	html += '<header><b>' + user + '</b>';
	html += '<time datetime="' + time + '">' + $.timeago(time) + '</time></header>';
	html += '<div class="message-description">' +decodeURIComponent(body)  + '</div>';
	
	// get attached file
	if (extension.fileName && extension.fileUID) {
		url = QBChatHelpers.getLinkOnFile(extension.fileUID);
		html += '<footer class="message-attach"><span class="glyphicon glyphicon-paperclip"></span> ';
		html += '<a href="' + url + '" target="_blank">' + extension.fileName + '</a></footer>';
	}
	
	html += '</section>';
	
	if ($('.typing-message')[0])
		$('.typing-message').before(html);
	else
		selector.append(html);
	
	selector.find('.message:even').addClass('white');
	selector.scrollTo('*:last', 0);
}

function logout() {
	// close the connection
	chatService.disconnect();
	$('#wrap').modal('hide');

}

/* Callbacks
----------------------------------------------------------*/
function onConnectFailed() {
	$('#loginForm .progress').hide();
	$('#loginForm button').show();
}

function onConnectSuccess() {
	var opponent = chooseOpponent(chatUser.login);
	$('#loadingModal').modal('hide');
	$('#wrap').modal({
				backdrop: 'static',
				keyboard: false
			});
	$('.panel-title .opponent').text($('#to_user_name').val());
	//$('.chat .chat-user-list').html('<li class="list-group-item"><span class="glyphicon glyphicon-user"></span> ' + $('#to_user_name').val() + '</li>');
	$('.chat .messages').empty();
	$('.chat input:text').focus().val('');
	//changeHeightChatBlock();	
	recipientID = $('#to_user_qb').val();
	
	// create a timer that will send presence each 60 seconds
	chatService.startAutoSendPresence(60);
}

function onConnectClosed() {
	//$('#wrap').hide();
	$('#wrap').modal('hide');
	//$('#loginForm .progress').hide();
	//$('#loginForm button').show();
	//alert("failed")
	chatUser = null;
	chatService = null;
}

function onChatMessage(senderID, message) {
	showMessage(message.body, message.time, message.extension);
}

function onChatState(senderID, message) {
	switch (message.state) {
	case 'composing':
		$('.chat .messages').append('<div class="typing-message">' + message.extension.nick + ' ...</div>');
		$('.chat .messages').scrollTo('*:last', 0);
		break;
	case 'paused':
		QBChatHelpers.removeTypingMessage($('.typing-message'), message.extension.nick);
		break;
	}
}
