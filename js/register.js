
var myaction  = 
	{
		collect_data: function(e, data_type)
		{
			e.preventDefault();
			e.stopPropagation();

			var inputs = document.querySelectorAll("form input");
            console.log(inputs);
			let myform = new FormData();
			for (var i = 0; i < inputs.length; i++) {

				myform.append(inputs[i].name, inputs[i].value);
			}

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

			ajax.open('post','php/register.php', true);
			ajax.send(form);
		},

		handle_result: function (result)
		{
			console.log(typeof result);
			// const obj = JSON.parse(result);
			//JSON.stringify(result)
			// alert(obj.success);
			var com= result;
			var comp=1
			if(com == comp )
			{
				alert("Profile created successfully");
				window.location.href = "login.html";
			}else{
				console.log("here");
				//show errors
				let error_inputs = document.getElementById("error");

				//empty all errors
				
					error_inputs.innerHTML = result;
				

				//display errors
				// for(key in obj.errors)
				// {
				// 	document.querySelector(".js-error-"+key).innerHTML = obj.errors[key];
				// }
			}
		}
	};
