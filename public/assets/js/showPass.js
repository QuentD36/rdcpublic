hidden = true;

function change(){
    if (hidden){
        document.getElementById('password').setAttribute('type', 'text');
        document.getElementById('eye').src="public/images/show.png";
        hidden = false;
    }else{
        document.getElementById('password').setAttribute('type', 'password');
        document.getElementById('eye').src="public/images/hidden.png";
        hidden = true;
    }
}