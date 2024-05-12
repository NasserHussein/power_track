@if(Session::has('success'))
    <div class="row mr-2 ml-2">
            <label style="white-space: normal;" type="text" class="btn btn-lg btn-block btn-outline-success mb-2"
                    id="type-error">{{Session::get('success')}}
            </label>
    </div>
@endif
