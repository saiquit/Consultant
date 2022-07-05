<!-- Modal -->
<div class="modal fade" id="contact-form-modal" tabindex="-1" role="dialog" aria-labelledby="contact-form-modal"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content bg-dark">
            <div class="modal-header">
                <h5 class="modal-title text-white" id="contact-form-modal">Contact Now</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-wrapper">
                    <form id="contact-form" action="#" method="POST">
                        <div class="row">
                            <div class="col-lg-12 col-md-6">
                                <div class="form-box  mb-10">
                                    <div class="wrapper">
                                        <input type="radio" name="select" id="option-1" checked>
                                        <input type="radio" name="select" id="option-2">
                                        <label for="option-1" class="option option-1">
                                            <div class="dot"></div>
                                            <span>Industry</span>
                                        </label>
                                        <label for="option-2" class="option option-2">
                                            <div class="dot"></div>
                                            <span>Consultant</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box  mb-30">
                                    <input type="text" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-box mb-30">
                                    <input type="text" name="email" placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-8 mb-30">
                                <div class="select-itms">
                                    <select name="select" id="select1">
                                        <option value="">Services</option>
                                        <option value="">Services-1</option>
                                        <option value="">Services-2</option>
                                        <option value="">Services-3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <button type="submit" class="send-btn">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div> --}}
        </div>
    </div>
</div>