$(document).ready(function () {
    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    
    OnKeyDown();
    function OnKeyDown() {
        document.addEventListener('keydown',function(e){
            if (e.key === 13) {
                SendMessage();
            }
        })
    }

    function SendMessage() {
        let message = `<div class="chat-content-rightside">
        <div class="d-flex ms-auto">
            <div class="flex-grow-1 me-2">
                <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
                <p class="chat-right-msg">${document.getElementById('wholesellerTxt').value}</p>
            </div>
        </div>
    </div>`;
    document.getElementById('wholeSalerMessages').innerHTML += message;
    }

});