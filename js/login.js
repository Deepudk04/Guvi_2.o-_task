
// function clicks()
// {
//     const myname=document.getElementById("use").value;
//     console.log(myname)
//     localStorage.setItem("name",myname);
// }
// localStorage.setItem("name",inputs);
var myaction  = 
	{
		collect_data: function(e)
		{
			e.preventDefault();
			e.stopPropagation();

			var myname=document.getElementById("name").value;
   		    //console.log(myname)
    		localStorage.setItem("names",myname);

			var inputs = document.querySelectorAll("form input");
          
            //console.log(inputs);
			let myform = new FormData();
			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
           
			}
            // console.log(inputs);
			myaction.send_data(myform);
		},

		send_data: function (form)
		{
            

			var ajax = new XMLHttpRequest();

			// document.querySelector(".progress").classList.remove("d-none");

			// //reset the prog bar
			// document.querySelector(".progress-bar").style.width = "0%";
			// document.querySelector(".progress-bar").innerHTML = "Working... 0%";

			ajax.addEventListener('readystatechange', function(){

				if(ajax.readyState == 4)
				{
					if(ajax.status == 200)
					{
						//all good
						myaction.handle_result(ajax.responseText);
					}else{
						console.log(ajax);
						alert("An error occurred");
					}
				}
			});

			// ajax.upload.addEventListener('progress', function(e){

			// 	let percent = Math.round((e.loaded / e.total) * 100);
			// 	document.querySelector(".progress-bar").style.width = percent + "%";
			// 	document.querySelector(".progress-bar").innerHTML = "Working..." + percent + "%";
			// });

			ajax.open('post','php/login.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			
			console.log(result);
			var com= result;
			var comp=1
			if(com == comp )
			{
				window.location.href = "php/profile.php";
			}
            else{
                alert("Invalid User Credentials");
				//window.location.href = "homepage.php";
			}
		}
	};
