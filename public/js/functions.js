
$(document).ready(function(){
	var app = new Vue({
  	el: '#app',
  	data:{
  		name:"Stuff",
  		favorite:""
  	},
  	methods:{
  		sendRequest:function(event){
  			var element = event.currentTarget;

  			var ad_id = element.getAttribute('href');
          
            console.log(ad_id);

            axios.get('/favorite/'+ad_id).then(function(response){
            	console.log(response);

            	if(response.data==true){
            		console.log(response.data);
            		$(element).addClass("favorited")
            	}
            	else{
            		$(element).removeClass("favorited")
            	}
            });


  		}
  	}
})
});