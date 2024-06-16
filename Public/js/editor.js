let r = '<input type="checkbox">',a='';

//Validation handler
let validationMessage = document.querySelector('.validation-message');

//Hide handlers
let editorContent = document.querySelector('#yourMap');
let newMap = document.querySelector('#newMap');
let campaignNewMap = document.querySelector('#campaign-new-map');

//Click handlers
let genHandler = document.getElementById("gen");
let genHandlerCamp = document.getElementById("genCamp");
let deleteHandler = document.querySelectorAll(".map-deletion");

let uploadMap = document.getElementById("addMap");
let uploadCampaign = document.getElementById("addCamp");

if(uploadCampaign){

    uploadCampaign.addEventListener('click',(e)=>{
        e.preventDefault();
        const campTitle = document.getElementById("campTitle").value;
        const campIndex = parseInt(document.getElementById("campIndex").value);
        const campCode = getCodeCampaign();

        const data = {
            campTitle: campTitle,
            campIndex: campIndex,
            campCode: campCode
        };

        fetch("/uploadCampaign",{

            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)

        }).then(function(response){
            validationMessage.classList.remove('levelHidd');
            if(response.status === 200){

                validationMessage.innerHTML = 'UPLOADED CAMPAIGN!';
                
            }else{

                validationMessage.innerHTML = 'ERROR!';

            }
            setTimeout(() => {
                location.reload();
            }, 2000);
            
        });
    });

}

if(uploadMap){

    uploadMap.addEventListener('click',(e)=>{
        e.preventDefault();
        const mapTitle = document.getElementById("mapTitle").value;
        const mapDifficulty = parseInt(document.getElementById("mapDifficulty").value);
        const mapCode = getCodeMap();

        const data = {
            mapTitle: mapTitle,
            mapDifficulty: mapDifficulty,
            mapCode: mapCode
        };

        fetch("/uploadMap",{

            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)

        }).then(function(response){
            validationMessage.classList.remove('levelHidd');
            if(response.status === 200){

                validationMessage.innerHTML = 'UPLOADED!';
                
            }else{

                validationMessage.innerHTML = 'ERROR!';

            }

            setTimeout(() => {
                location.reload();
            }, 2000);
            
        });
    });

}

if(deleteHandler){

    for (let i = 0; i < deleteHandler.length; i++) {

        deleteHandler[i].addEventListener('click',(e)=>{
            e.preventDefault();
            let id = parseInt(deleteHandler[i].getAttribute('value'));

            const data = {mapId: id};

            fetch("/deleteMap",{
                method: "POST",
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            }).then(function(){
                deleteHandler[i].parentNode.remove();
            });
        });
    }
    
}

if(genHandler){
    genHandler.addEventListener('click',()=>{

        if(how.value<5 || how.value>50) return 0;
    
        document.querySelector('#checksMap').innerHTML = '';
        for(let i=0;i<how.value;i++){
            document.querySelector('#checksMap').innerHTML+=r+r+r+r+r;
        }
    });
}


if(genHandlerCamp){
    genHandlerCamp.addEventListener('click',()=>{

        if(howCamp.value<5 || howCamp.value>50) return 0;
    
        document.querySelector('#checksCampaign').innerHTML = '';
        for(let i=0;i<howCamp.value;i++){
            document.querySelector('#checksCampaign').innerHTML+=r+r+r+r+r;
        }
    });
}

function display(elementToDisplay){

    if(elementToDisplay == 1){
        editorContent.classList.remove("levelHidd");
        newMap.classList.add("levelHidd");
        campaignNewMap.classList.add("levelHidd");
    }

    if(elementToDisplay == 2){
        editorContent.classList.add("levelHidd");
        newMap.classList.remove("levelHidd");
        campaignNewMap.classList.add("levelHidd");
    }

    if(elementToDisplay == 3){
        editorContent.classList.add("levelHidd");
        newMap.classList.add("levelHidd");
        campaignNewMap.classList.remove("levelHidd");
    }

}

function getCodeMap(){
    h = document.querySelectorAll('#checksMap input'), a = '';
    for(let i of h){
        if(i.checked){
            a+= '1,';
        }else{
            a+= '0,';
        }
    }
    return '['+a.slice(0,-1)+']';
}

function getCodeCampaign(){
    h = document.querySelectorAll('#checksCampaign input'), a = '';
    for(let i of h){
        if(i.checked){
            a+= '1,';
        }else{
            a+= '0,';
        }
    }
    return '['+a.slice(0,-1)+']';
}



