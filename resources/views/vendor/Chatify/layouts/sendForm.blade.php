<div class="messenger-sendCard">
    <form id="message-form" method="POST" action="{{ route('send.message') }}" enctype="multipart/form-data">
        @csrf
        <?php if(Auth::user()->type =='Patient'||  Auth::user()->type =='Consalutant' ){ ?>
            <label><span class="fas fa-paperclip"></span><input disabled='disabled' type="file" class="upload-attachment" name="file" accept="image/*, .txt, .rar, .zip" /></label>
        <textarea readonly='readonly' name="message" class="m-send app-scroll" placeholder="Type a message.."></textarea>
        <button disabled='disabled'><span class="fas fa-paper-plane"></span></button>
                    <?php }?>
        
    </form>
</div>