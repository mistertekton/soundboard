function playSound(group, filename)
{
    var audio = new Audio('content/sounds/' + group + '/' + filename);
    audio.play();    
}
