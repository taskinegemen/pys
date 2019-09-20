var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http);
var mysql = require('mysql');
const util=require('util');
const RiveScript = require('rivescript');


Promise.prototype.isPending = function(){ return util.inspect(this).indexOf("<pending>")>-1; }

var con = mysql.createConnection({
  host: "localhost",
  user: "phpmyadmin",
  password: "8F9N79",
  database: "pys"
});

con.connect(function(err) {
  if (err) throw err;
  console.log("Connected!");
});
var sql="select * from conversation"
  con.query(sql, function (err, result,fields) {
    if (err) throw err;
    console.log("Result: ", result);
  });


var bot = new RiveScript({utf8: true});
//bot.utf8_punctuation = new RegExp(/[.,!?;:]/); // override it with a new regexp
bot.unicodePunctuation = new RegExp(/[.,!?;:]/g);

//bot.unicodePunctuation = new RegExp(/[.,!?;:]/g);

bot.loadDirectory("brain").then(loading_done).catch(loading_error);

function loading_done() {
  console.log("Bot has finished loading!");
 
  // Now the replies must be sorted!
  bot.sortReplies();
 
  // And now we're free to get a reply from the brain!
 
  // RiveScript remembers user data by their username and can tell
  // multiple users apart.
 
  // NOTE: the API has changed in v2.0.0 and returns a Promise now.
  /*bot.reply("moderator", "Hello, bot!").then(function(reply) {
    console.log("The bot says: " + reply);
  });*/
}

// It's good to catch errors too!
function loading_error(error, filename, lineno) {
  console.log("Dosyaları yüklerken hata meydana geldi: " + error);
}
function isJSON(str) {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
}
function encode_utf8(s) {
  return unescape(encodeURIComponent(s));
}
async function message_related_to_moderator(msg)
{
	var result_message;
	var result_Promise= await bot.reply(msg.user_id, msg.message);
	 /* bot.reply(msg.user_id, "Hello, bot!").then(function(reply) {
    result_message=reply;
  });*/

	console.log("moderator reply",msg,result_Promise);
	if(result_Promise!='NULL')
	{
		msg["moderator"]={'reply':result_Promise};
	}
	console.log("moderator reply cont.=>",msg)

	return msg;
}


app.get('/', function(req, res){
  res.sendFile(__dirname + '/index.html');
});


io.on('connection', function(socket){
	console.log("a user connected");
  socket.on('chat message', async function(msg){
  	console.log("message",msg);
  	var msg_processed=await message_related_to_moderator(msg);
  	console.log("İŞTE JSON=>");
  	 console.log("msg_processed=>",msg_processed);
  	if(typeof msg_processed.moderator !== "undefined" && isJSON(msg_processed.moderator.reply))
  	{
  		var msg_processed_json=JSON.parse(msg_processed.moderator.reply);
	  	if(msg_processed_json.type=="error_mask")
	  	{
	  		var mask=msg_processed_json.mask;
	  		for(var mask_i=0; mask_i<mask.length;mask_i++)
	  		{
	  			msg_processed.message=msg_processed.message.replace(mask[mask_i],"******");
	  			msg_processed.moderator.reply=msg_processed_json.message;
	  		}
	  	}
  	}
  	console.log("LAST MESSAGE",msg_processed);
  	//{"agreed": [1, 2, 3]}
  	var status_object='{"agreed":[]}';
  	var sql = "INSERT INTO conversation (conversation_user_id, conversation_proposal_id,conversation_message,conversation_status) VALUES ("+msg_processed.user_id+","+msg_processed.proposal_id+",'"+msg_processed.message+"','"+status_object+"');";
  	console.log("SQL",sql);
  	con.query(sql, function (err, result) {
    	if (err) throw err;
    	msg_processed["conversation_id"]=result.insertId;
    	console.log("before:1 record inserted",result,result.affectedRows);
    	//var sql="INSERT INTO conversation_status(conversation_user_conversation_id,conversation_user_user_id) VALUES ("+msg_processed.conversation_id+","+msg_processed.user_id+");";
    	//con.query(sql,function(err,result){});
    	console.log("after:1 record inserted",result,result.affectedRows);
    	io.emit('chat message', msg_processed);


  	});


  });
});


http.listen(3000, function(){
  console.log('listening on *:3000');
});

