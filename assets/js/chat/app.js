/*
 * Sample JavaScript app using some of the QuckBlock WebSDK APIs
 *
 * Author: Dan Murphy (dan@quickblox.com)
 *
 */

(function () {
  APP = new App();
  $(document).ready(function(){
    APP.init();
    $.ajaxSetup({cache:true});
    $.getScript('//connect.facebook.net/en_UK/all.js', function(){
    });
  });
}());

function App(){
  console.log('App constructed');
}

App.prototype.init = function(){
  var _this= this;
  //this.compileTemplates();
  $('#sessionButton').click(function(e){e.preventDefault();//alert(hi);exit;
														 _this.createSession(e); return false;});
  $('#sessionDeleteButton').click(function(e){e.preventDefault(); _this.deleteSession(e); return false;});
  $('#createContentButton').click(function(e){e.preventDefault(); _this.createContent(e); return false;});
  $('#sessionButton1').click(function(e){e.preventDefault(); _this.prepareDataForSignUp(e); return false;});

  
};

App.prototype.compileTemplates = function(){
  var template = $('#content-template').html();
  this.template = Handlebars.compile(template);
};
//login create session having quickblox id
App.prototype.createSession = function(e){
  var appId, authKey, secret, user, password, _this = this;
  console.log('createSession', e);
  appId = '23119';
  authKey = 'PgYNyVxGKQdKWVj';
  secret = 'bY6bx-pGbLJfSR5';
  console.log(appId, authKey, secret);
  user = $('#user_id_qb').val();
  password =$('#user_pass_qb').val();
  QB.init(appId,authKey,secret, true);
  if (user && password) {
      QB.createSession({login: user, password: password}, function(e,r){
		_this.sessionCallback(e,r);
	 setTimeout('window.location.assign(siteurl+"dashboard")',500);	
		//getQBUser(result.user_id, result.token, (storage ? storage.pass : null));

});
    } else {
      QB.createSession(function(e,r){_this.sessionCallback(e,r);});
    }
};

//signup create session and signup to qickblox
App.prototype.prepareDataForSignUp = function(e){
  var appId, authKey,user_id, secret, user, password, _this = this;
  console.log('createSession', e);
  appId = '23119';
  authKey = 'PgYNyVxGKQdKWVj';
  secret = 'bY6bx-pGbLJfSR5';
  console.log(appId, authKey, secret);
  user_id = $('#user_id1').val();
  params = {
		login: $('#user_id_qb').val(),
		password: $('#user_pass_qb').val()
	};
	console.log(params);
  QB.init(appId,authKey,secret, true);
  QB.createSession(function(e,r) {
		if (e) {
			console.log(e.detail);
			_this.sessionCallback(e,r);
		} else {
			
			QB.users.create(params, function(e, r) {
				if (e) {
					console.log(e.detail);
			       _this.sessionCallback(e,r);
				} else {
					//var res = JSON.parse(r);
					//console.log(res);console.log("--------");console.log()
					//signUpSuccess();	
					//console.log(r.detail);
						$.ajax({
				type:'POST',
				url:siteurl+'hotel_staff/updateQuickBloxId',
				data:{'quickblox_id':r.id,'user_id' : user_id},

				success:function(data){ //alert(member_type);
					if(member_type == '2')
					 window.location.href=siteurl+"hotel_staff/";
					else 
					   window.location.href=siteurl+"dashboard";
				}
			          });
				}
			});
		}
	});
/*  if (user && password) {
      QB.createSession({login: user, password: password}, function(e,r){_this.sessionCallback(e,r);});
    } else {
      QB.createSession(function(e,r){_this.sessionCallback(e,r);});
    }*/
	
	
	
};

App.prototype.sessionCallback= function(err, result){
  console.log('Session create callback', err, result);
  if (result){
    $('#session').append('<p><em>Created session</em>: ' + JSON.stringify(result) + '</p>');
    $('#sessionDeleteButton').removeAttr('disabled');
  } else {
    $('#session').append('<p><em>Error creating session token<em>: ' + JSON.stringify(err)+'</p>');
  }
};

App.prototype.deleteSession = function(e){
  var token = QB.service.qbInst.session.token;
  console.log('deleteSession', e);
  QB.destroySession(function(err, result){
    console.log('Session destroy callback', err, result);
    if (result) {
      $('#session').append('<p><em>Deleted session token</em>: ' + token + '</p>');
      $('#sessionDeleteButton').attr('disabled', true);
    } else {
      $('#session').append('<p><em>Error occured deleting session token</em>: ' + JSON.stringify(err) + '</p>');
    }
  });
};

App.prototype.createContent= function(e){
  var form, params={}, name, type, isPublic, tags, _this= this;
  console.log('createContent', e);
  form = $('#createContent');
  name = form.find('#name')[0].value;
  isPublic = form.find('#public')[0].value === 'true';
  type = form.find('#type')[0].value;
  tags = form.find('#tags')[0].value;
  if (name) {params.name = name;}
  if (isPublic) {params.public = isPublic;}
  if (tags) {params.tag_list = tags;}
  params.file = form.find('#file')[0].files[0];
  QB.content.createAndUpload(params, function (err, result){
      if (err) {
        $('#usersList').append('<p><em>Error creating content</em>:' + JSON.stringify(err) + '</p>');
      } else {
        QB.content.getFileUrl(result.id, function (err, res) {
          $('#contentList').append('<p><em>File URL</em>:' + res + '</p>');
          $('#contentList').append('<img src="' + res + '"/>' );
          });
      }
  });
};



// parseUri 1.2.2
// (c) Steven Levithan <stevenlevithan.com>
// MIT License
// http://blog.stevenlevithan.com/archives/parseuri

function parseUri (str) {
	var	o   = parseUri.options,
		m   = o.parser[o.strictMode ? "strict" : "loose"].exec(str),
		uri = {},
		i   = 14;

	while (i--) {uri[o.key[i]] = m[i] || "";}

	uri[o.q.name] = {};
	uri[o.key[12]].replace(o.q.parser, function ($0, $1, $2) {
		if ($1) {uri[o.q.name][$1] = $2;}
	});

	return uri;
}

parseUri.options = {
	strictMode: false,
	key: ["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],
	q:   {
		name:   "queryKey",
		parser: /(?:^|&)([^&=]*)=?([^&]*)/g
	},
	parser: {
		strict: /^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,
		loose:  /^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/)?((?:(([^:@]*)(?::([^:@]*))?)?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/
	}
};
