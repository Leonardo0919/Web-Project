elementList = document.querySelectorAll('img');
for (let i =0;i<elementList.length;i++){
    elementList[i].addEventListener('mouseenter',function(){
        elementList[i].style.opacity = "0.5";
        
    })

    elementList[i].addEventListener('mouseleave',function(){
        elementList[i].style.opacity = "1";
        
    })

    
}