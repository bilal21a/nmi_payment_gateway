    <div class="modal modal-right large fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="modalTitle"></h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body scroll-y mx-5">
                    <form method="post" enctype="multipart/form-data" id="edit_data_form">
                        @csrf
                        @method('PUT')
                    </form>
                    <form method="post" enctype="multipart/form-data" id="add_data_form">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
