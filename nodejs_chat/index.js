var app = require('express')();
var http = require('http').createServer(app);
var io = require('socket.io')(http,{path: '/octagon/socket.io'}); 
var mysql = require('mysql');
const util=require('util');
const RiveScript = require('rivescript');


Promise.prototype.isPending = function(){ return util.inspect(this).indexOf("<pending>")>-1; }
/*Array.prototype.diff = function(a) {
    return this.filter(function(i) {return a.indexOf(i) < 0;});
};*/

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
/*
var sql="select * from conversation"
  con.query(sql, function (err, result,fields) {
    if (err) throw err;
    console.log("Result: ", result);
  });*/


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
  //console.log("ROOMS:",io.sockets.adapter.rooms);
  var rooms=io.sockets.adapter.rooms;
        for (var room in rooms) {
            if (!rooms[room].hasOwnProperty(room)) {
                console.log(room,"room=>",rooms[room]);
                console.log("clients=>",io.sockets.adapter.rooms[room]);


                //availableRooms.push(room);
            }
        }
  var all="rooms:"+JSON.stringify(io.sockets.adapter.rooms)+"<br>"+"rooms size:"+io.sockets.adapter.rooms.length;
  res.send(all);
//io.adapter.rooms
  //res.sendFile(__dirname + '/index.html');
});

function getTotalGrades(ArrayValue)
{
  var totalGrades=0;
  for(var i=0;i<ArrayValue.length;i++)
  {
    totalGrades+=ArrayValue[i];
  }
  return totalGrades;
}
const intervalObj = setInterval(() => {
    var rooms=io.sockets.adapter.rooms;
    for (var room in rooms) 
    {
        if (!rooms[room].hasOwnProperty(room)) 
        {
          var criteria=io.sockets.adapter.rooms[room].criteria;
          if(typeof criteria !== "undefined")
          {
            var criteria=JSON.parse(criteria);
            var non_criteria=criteria.non_criteria;
            //console.log("CRITERIA INT=>",criteria);

            try{

            if(io.sockets.adapter.rooms[room].panel_finished==1)
            {
            console.log("Bu odadaki["+room+"] panel son ermiştir");
            }
            else if(io.sockets.adapter.rooms[room].length>=criteria.others.total_panelist && typeof io.sockets.adapter.rooms[room].step ==="undefined")
              {
                console.log("oda doldu ya la! ilk mesajı yolla");
                var msg={};
                io.sockets.adapter.rooms[room].grades=[];
                io.sockets.adapter.rooms[room].grades_who=[];
                msg["moderator"]={'reply':'Sayın panelistler, bahsi geçen proje önerisinin bilimsel değerlendirmesine başlıyoruz...Hoşgeldiniz!'};
                io.sockets.in(room).emit('chat message', msg);
                io.sockets.adapter.rooms[room].step=1;//pass to next step;
                io.sockets.adapter.rooms[room].timestamp=Math.floor(Date.now() / 1000);
              }
              else if(io.sockets.adapter.rooms[room].grades.length>0 && (typeof io.sockets.adapter.rooms[room].non_criteria_progress==="undefined"))
              {
                var grades=io.sockets.adapter.rooms[room].grades;
                var total_grades=[];
                console.log("COMPARISON=>",grades,grades.length,criteria.others.total_panelist);
                if(grades.length>=criteria.others.total_panelist)
                {
                            for(var grade in grades)
                            {
                              for (var grade_sub in grades[grade])
                              {
                                var new_grade=grades[grade];
                                console.log("GRADE SUB=>",grade,grade_sub,new_grade[grade_sub]);
                                var grade_sub_criteria=criteria.criteria[grade_sub].criteria_name;
                                if(typeof total_grades[grade_sub_criteria] === "undefined")
                                {
                                  total_grades[grade_sub_criteria]=0; 
                                }
                                total_grades[grade_sub_criteria]+=new_grade[grade_sub]/criteria.others.total_panelist;

                              }
                            }

                            console.log("TOPLAM PUAN=>",total_grades);
                            var l=0;
                            var total_grades_total=0;
                            var total_msg="";
                            var passquestion_criteria=0;
                            var passquestion_total=0;
                            var table="";
                            for(var eval_criteria in total_grades)
                            {
                              //console.log("1.EVAL CRITERIA",eval_criteria);
                              for(var m=0; m<criteria.criteria.length;m++)
                              {
                                //console.log("2. EVAL CRITERIA",criteria.criteria[m].criteria_name,eval_criteria);
                                if(criteria.criteria[m].criteria_name==eval_criteria)
                                {
                                  console.log("whole criteria",criteria.criteria[m]);
                                  var eval_op=criteria.criteria[m].criteria_op;
                                  var eval_val=criteria.criteria[m].criteria_value;
                                  table+="<tr><td>"+criteria.criteria[m].criteria_name+"</td><td>"+total_grades[eval_criteria]+"</td></tr>";
                                  console.log("EVAL",eval_val,eval_op,total_grades[eval_criteria]);
                                  if(typeof eval_op !=="undefined" && typeof eval_val!=="undefined")
                                  {
                                    if(eval(total_grades[eval_criteria]+eval_op+eval_val))
                                    {
                                      total_msg+=eval_criteria+" kriteri için belirlenen "+eval_val+" puanı üstünde bir puan("+total_grades[eval_criteria]+") almıştır<br><br>";
                                      console.log(eval_criteria+" kriteri için belirlenen "+eval_val+" puanı üstünde bir puan("+total_grades[eval_criteria]+") almıştır.");
                                      passquestion_criteria=1;

                                    }
                                    else
                                    {
                                      total_msg+=eval_criteria+" kriteri için belirlenen "+eval_val+" puanı altında bir puan("+total_grades[eval_criteria]+") almıştır<br><br>";
                                      console.log(eval_criteria+" kriteri için belirlenen "+eval_val+" puanı altında bir puan("+total_grades[eval_criteria]+") almıştır.");                            
                                      passquestion_criteria=0;
                                    }
                                  }
                                }
                              }
                              total_grades_total+=total_grades[eval_criteria];
                            }
                            //total grade check begin
                            var criteria_overall=criteria.criteria_overall;
                            var overall_op=criteria_overall.criteria_op;
                            var overall_value=criteria_overall.criteria_value;
                            table+="<tr><td>Toplam Puan:</td><td>"+total_grades_total+"</td></tr>";
                            if(eval(total_grades_total+overall_op+overall_value))
                            {
                              total_msg+="Toplam puan için belirlenen <b>"+overall_value+"</b> puanı üstünde bir puan("+total_grades_total+") almıştır.<br><br>";
                              console.log("Toplam puan için belirlenen "+overall_value+" puanı üstünde bir puan("+total_grades_total+") almıştır.");
                              passquestion_total=1
                            }
                            else
                            {
                              total_msg+="Toplam puan için belirlenen <b>"+overall_value+"</b> puanı altında bir puan("+total_grades_total+") almıştır.<br><br>";
                              console.log("Toplam puan için belirlenen "+overall_value+" puanı altında bir puan("+total_grades_total+") almıştır.");                            
                              passquestion_total=0;
                            }
                            var msg={};
                            if(passquestion_total==1 && passquestion_criteria==1)
                            {

                              total_msg+="Destek çıtasının üzerinde bir puan almasından dolayı projenin diğer kriterleri hakkında yorum yapmaya devam edeceğiz.<br>";
                              io.sockets.adapter.rooms[room].non_criteria_progress=1;
                              total_msg+="<br><table border='1'>"+table+"</table>";
                              msg["moderator"]={'reply':total_msg};
                            }
                            else
                            {
                              total_msg+="Destek çıtasının altında bir puan almıştır. Bilimsel değerlendirme sona ermiştir. Şimdi panel raporu yazmaya başlayalım...Panel raporu yazma penceresi açılacaktır. Lütfen bekleyiniz...";
                              io.sockets.adapter.rooms[room].non_criteria_progress=0;
                              total_msg+="<br><table border='1'>"+table+"</table>";
                              msg["moderator"]={'reply':total_msg, 'panel_finished':1};
                              io.sockets.adapter.rooms[room].panel_finished=1;  
                            }
                            io.sockets.adapter.rooms[room].timestamp=Math.floor(Date.now() / 1000); 
                            io.sockets.in(room).emit('chat message', msg);

                  //total grade check end


                }
                else
                {
                  //oy verenlerin toplanmasını bekliyoruz...
                var msg={};
                /*var sockets_in_room=[];
                for(var socket_in_room in io.sockets.adapter.rooms[room].sockets)
                {
                  sockets_in_room.push(socket_in_room);
                }
                console.log("SOCKETS IN ROOMS",sockets_in_room);
                var not_yet_received_grades=sockets_in_room.diff(io.sockets.adapter.rooms[room].grades_who);
                var not_yet_received_grades_reverse=io.sockets.adapter.rooms[room].grades_who.diff(sockets_in_room);
                not_yet_received_grades=not_yet_received_grades.concat(not_yet_received_grades_reverse);
                for(var not_yet=0; not_yet<not_yet_received_grades.length;not_yet++)
                {
                  msg["moderator"]={'reply':'Tüm bölümlerin değerlendirmesini tamamlamış bulunuyoruz. Aşağıda verilen oy pusulalarını işaretleyiniz!','proposal_id':room.replace("form_","")};
                  io.to(not_yet_received_grades[not_yet]).emit('chat message', msg);
                }*/
                msg["moderator"]={'reply':'Tüm bölümlerin değerlendirmesini tamamlamış bulunuyoruz. Aşağıda verilen oy pusulalarını işaretleyiniz!','proposal_id':room.replace("form_","")};
                io.sockets.in(room).emit('chat message', msg);

                }
              }
            else if(io.sockets.adapter.rooms[room].non_criteria_progress==1)
            {
              if((Math.floor(Date.now() / 1000)-io.sockets.adapter.rooms[room].timestamp)>30)
              {

              
                if(typeof io.sockets.adapter.rooms[room].step_non_criteria==="undefined")
                {
                  io.sockets.adapter.rooms[room].step_non_criteria=1;
                }
                if(non_criteria.length>=io.sockets.adapter.rooms[room].step_non_criteria)
                {
                  var non_criteria_name=non_criteria[io.sockets.adapter.rooms[room].step_non_criteria-1].non_criteria_name;
                  var msg={};
                  msg["moderator"]={'reply':'Şimdi '+non_criteria_name+' bölümüne geçiyoruz! Bu bölümle alakalı yorum yaparken her bir yorumunuzu lütfen bir cümlede ifade ediniz!'};
                  io.sockets.in(room).emit('chat message', msg);
                  io.sockets.adapter.rooms[room].step_non_criteria++; 
                  io.sockets.adapter.rooms[room].timestamp=Math.floor(Date.now() / 1000); 
                }
                else
                {
                  var msg={};
                  msg["moderator"]={'reply':'Bilimsel değerlendirme sona ermiştir. Şimdi panel raporu yazmaya başlayalım...Panel raporu yazma penceresi açılacaktır. Lütfen bekleyiniz...','panel_finished':1};
                  io.sockets.in(room).emit('chat message', msg);
                  io.sockets.adapter.rooms[room].panel_finished=1; 
                }
              }
            }
            else if(io.sockets.adapter.rooms[room].step==criteria.criteria.length+1)//last message
            {
                var msg={};
                /*var sockets_in_room=[];
                for(var socket_in_room in io.sockets.adapter.rooms[room].sockets)
                {
                  sockets_in_room.push(socket_in_room);
                }
                console.log("SOCKETS IN ROOMS",sockets_in_room);
                var not_yet_received_grades=sockets_in_room.diff(io.sockets.adapter.rooms[room].grades_who);
                var not_yet_received_grades_reverse=io.sockets.adapter.rooms[room].grades_who.diff(sockets_in_room);
                not_yet_received_grades=not_yet_received_grades.concat(not_yet_received_grades_reverse);
                for(var not_yet=0; not_yet<not_yet_received_grades.length;not_yet++)
                {
                  msg["moderator"]={'reply':'Tüm bölümlerin değerlendirmesini tamamlamış bulunuyoruz. Aşağıda verilen oy pusulalarını işaretleyiniz!','proposal_id':room.replace("form_","")};
                  io.to(not_yet_received_grades[not_yet]).emit('chat message', msg);
                }*/
                msg["moderator"]={'reply':'Tüm bölümlerin değerlendirmesini tamamlamış bulunuyoruz. Aşağıda verilen oy pusulalarını işaretleyiniz!','proposal_id':room.replace("form_","")};
                io.sockets.in(room).emit('chat message', msg);
            }
            else if(io.sockets.adapter.rooms[room].step>0 && io.sockets.adapter.rooms[room].step<=criteria.criteria.length && (Math.floor(Date.now() / 1000)-io.sockets.adapter.rooms[room].timestamp)>30)//30 seconds
            {
              var criteria_sub=criteria.criteria[io.sockets.adapter.rooms[room].step-1];
              var criteria_op=criteria_sub.criteria_op;
              var criteria_name=criteria_sub.criteria_name;
              var criteria_value=criteria_sub.criteria_value;
              var criteria_value_max=criteria_sub.criteria_value_max;
              var criteria_value_min=criteria_sub.criteria_value_min;
              var msg={};
               /*if(io.sockets.adapter.rooms[room].step<=criteria.criteria.length)
               {*/
                  msg["moderator"]={'reply':'Şimdi '+criteria_name+' bölümüne geçiyoruz! Bu bölümle alakalı yorum yaparken her bir yorumunuzu lütfen bir cümlede ifade ediniz!'};
                  io.sockets.in(room).emit('chat message', msg);
                  io.sockets.adapter.rooms[room].step++;
               /*}
               else
               {
                  msg["moderator"]={'reply':'Tüm bölümlerin değerlendirmesini tamamlamış bulunuyoruz. Aşağıda verilen oy pusulalarını işaretleyiniz!','proposal_id':room.replace("form_","")};
                  io.sockets.in(room).emit('chat message', msg);
               }*/
              io.sockets.adapter.rooms[room].timestamp=Math.floor(Date.now() / 1000);

            }
            console.log(room,"room=>",rooms[room]);
            console.log("clients=>",io.sockets.adapter.rooms[room]);
            }//try ends
            catch(err){
              console.log("ERROR|TRY|CATCH=>",err.message);
            }
            //initial if statement ends



          }



        }
    } 

}, 1000*10);


io.on('connection', function(socket){
	//console.log("a user connected=>",socket);
  var room_id=socket.handshake.query['room_id'];
  console.log("a user connected",socket.handshake.query['room_id']);
  socket.join("room_"+room_id);

    if(typeof io.sockets.adapter.rooms["room_"+room_id].criteria === "undefined")
    {
      var sql = "SELECT evaluation_template_criteria FROM evaluation, evaluation_template where evaluation.evaluation_evaluation_template_id=evaluation_template.evaluation_template_id and evaluation.evaluation_proposal_id="+room_id+";";
      console.log("SQL",sql);
      con.query(sql, function (err, result) {
        console.log("ROOM ID=>","room_"+room_id, "result:",result[0].evaluation_template_criteria);

        io.sockets.adapter.rooms["room_"+room_id].criteria =result[0].evaluation_template_criteria;

      });
    }


  socket.on('chat message', async function(msg){
  	console.log("message",msg);
    //socket.join("room_"+);

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
  	var status_object=JSON.stringify({"agreed":[],"step":io.sockets.adapter.rooms['room_'+msg_processed.proposal_id].step});
  	var sql = "INSERT INTO conversation (conversation_user_id, conversation_proposal_id,conversation_message,conversation_status) VALUES ("+msg_processed.user_id+","+msg_processed.proposal_id+",'"+msg_processed.message+"','"+status_object+"');";
  	console.log("SQL",sql);
  	con.query(sql, function (err, result) {
    	if (err) throw err;
    	msg_processed["conversation_id"]=result.insertId;
      msg_processed["socket_id"]=socket.id;
    	//console.log("before:1 record inserted",result,result.affectedRows);
    	//var sql="INSERT INTO conversation_status(conversation_user_conversation_id,conversation_user_user_id) VALUES ("+msg_processed.conversation_id+","+msg_processed.user_id+");";
    	//con.query(sql,function(err,result){});
    	//console.log("after:1 record inserted",result,result.affectedRows);

      if(typeof msg_processed.grades !=="undefined")//puanlama meydana geldi
      {
        console.log("GRADES=>",msg_processed,msg_processed.grades);
        io.sockets.adapter.rooms["room_"+msg_processed["proposal_id"]].grades.push(msg_processed.grades);
        io.sockets.adapter.rooms["room_"+msg_processed["proposal_id"]].grades_who.push(msg_processed.socket_id);
      }
      else
      {
    	 io.sockets.in("room_"+msg_processed["proposal_id"]).emit('chat message', msg_processed);
      }
      //io.emit('chat message', msg_processed);


  	});


  });
});


http.listen(3000, function(){
  console.log('listening on *:3000');
});

