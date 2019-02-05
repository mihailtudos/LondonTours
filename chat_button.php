
<!-- live chat 
  is a fixed position button that launch a pop-up using js with a form as content 
  it is design to help users to get in touch faster -->
<!-- button chat -->
<div class="btn-chat" id="livechat-compact-container" >
  <div class="btn-holder" data-toggle="modal" data-target="#exampleModal">
    <a  href="#" class="link">Live Chat</a>
  </div>
</div>
<!-- Content of the modal, consists of a pop-up that is using js with a form of content 
  it is design to help users to get in touch faster-->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat with Us</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="formForMessages">
          <!-- the form with the three required fields -->
          <form>
            <div class="row">
              <div class="col">
                <span class="mandarory">*</span>
                <input type="text" class="form-control" placeholder="Name" required>
              </div>
              <div class="col">
                <span class="mandarory">*</span>
                <input type="email" class="form-control" placeholder="Email" required>
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1"><span class="mandarory">*</span></label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Your message goes here..."></textarea>
            </div>
            <div class="form-group row">
              <div class="col-xl-6 col-sm-6">
                <button type="submit" class="btn btn-secondary btn-lg btn-block active">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

