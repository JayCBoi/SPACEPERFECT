let l = [];

doWhatUNeed(campaignMap);

function doWhatUNeed(r){
    o = r;
    while(o.length) l.push(o.splice(0,5));
}

const App = {
    music: {song: new Audio('/public/sound/song.mp3'),crash:new Audio('/public/sound/crash.wav')},
    myLevel: l,
    currentLevel:[],
    playerX: 2,
    places: document.querySelectorAll('.game div'),
    playerPlaces: document.querySelectorAll('.game div:nth-last-child(-n+5)'),
    itsOn:'',
    collision:'',
    speed: 500,
    waves:10,
    listenBoi(){
        b1.addEventListener('click', () => {
            this.startGame();
        }, false);
        document.addEventListener('keydown', (e) => {
            if(e.keyCode == 27)location.reload();
        });
        this.collision = setInterval(()=>this.catchCollision(),50);

        b3.addEventListener('click', () => {
            credits.innerHTML = 'By: Piotr Zbiński | Music: SOAD ChopSuey[8BIT]';
        }, false);
    },
    startGame(){
        document.querySelector('body').classList.add("playing");
        App.addEmpty();
        this.music.song.play();
        this.game();
    },
    game(){
        setTimeout(()=>this.controls(),1800);
        setTimeout(()=>{
            this.itsOn = setTimeout(()=>this.goDown(),this.speed);
        },6500);
    },
    goDown(){
        this.shiftLevels();
        this.showLevel();
        clearTimeout(this.itsOn);
        console.log(this.waves)
        if(this.waves % 100 == 0)this.speed *= 1;
        if(this.waves == this.myLevel.length) this.endGame(1);
        else this.itsOn = setTimeout(()=>this.goDown(),this.speed);
        
        
    },
    showLevel(){
        let d2 = [].concat(...this.currentLevel);
        for(let i in d2){
            if(this.places[i].classList.contains('b') && d2[i]==0){this.places[i].classList.remove('b')}
            else if(!this.places[i].classList.contains('b') && d2[i])this.places[i].classList.add('b');
        }
    },
    shiftLevels(){
        this.currentLevel.pop();
        this.currentLevel.unshift(this.myLevel[this.waves++]);
    },
    controls(){
        //HANDLERS
        this.handler1 = (e) =>{
            const k = e.keyCode;
            if(k==37 && this.playerX != 0)this.move(-1);
            if(k==39 && this.playerX != 4)this.move(1);
        },
        this.handler2 = (e) =>{
            var touchobj = e.changedTouches[0];
            canswipe = true;
            startX = parseInt(touchobj.clientX);
        },
        this.handler3 = (e) =>{
            var touchobj = e.changedTouches[0];
            dist = parseInt(touchobj.clientX) - startX;
            if(dist>15 && this.playerX != 4 && canswipe){this.move(1);canswipe = false;}
            if(dist<-15 && this.playerX != 0 && canswipe){this.move(-1);canswipe = false;}
        }
        //ARROWS
        document.addEventListener('keydown', this.handler1);

        //TOUCHPAD|MOBILE-DEVICE
        document.addEventListener('touchstart', this.handler2);
        document.addEventListener('touchmove', this.handler3);
        
    },
    move(a){
        this.playerPlaces[this.playerX].classList.remove('p');
        this.playerX +=a;
        this.playerPlaces[this.playerX].classList.add('p');
    },
    catchCollision(){
        for(let i of this.playerPlaces){
            if(i.classList.contains('b') && i.classList.contains('p'))this.endGame(0);
        }
    },
    endGame(a){
        clearInterval(this.collision);
        clearTimeout(this.itsOn);
        document.removeEventListener('keydown', this.handler1);
        document.removeEventListener('touchstart', this.handler2);
        document.removeEventListener('touchmove', this.handler3);
        this.music.song.pause();
        if(a){
            document.querySelector('.endwin').style.display = 'flex';
        }else{
            document.querySelector('.endlose').style.display = 'flex';
            document.querySelector('div.p').style.background = 'red';
            this.music.crash.play();
        }
    },
    addBests(){
        // $.ajax({
        //     url: "js/take.php",
        //     type: "post"
        // })
        // .done(function(r) {
        //     best.innerHTML = r;
        // })
    },
    addEmpty(){

        for(let i=0;i<15;i++){
            this.myLevel.push([0,0,0,0,0]);
            this.myLevel.unshift([0,0,0,0,0]);
        }
        for(let i=0;i<10;i++){
            this.currentLevel.push(this.myLevel[i]);
        }
    },
    init (){
        document.addEventListener('DOMContentLoaded', () => {
            this.listenBoi();
            this.addBests();
        }, false);
    }
}
window.showMessage = App.showMessage;
App.init();