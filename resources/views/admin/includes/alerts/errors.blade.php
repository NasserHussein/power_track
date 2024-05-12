@if(Session::has('error'))
    <div class="row mr-2 ml-2" >
            <label style="white-space: normal;" type="text" class="btn btn-lg btn-block btn-outline-danger mb-2"
                    id="type-error">{{Session::get('error')}}
            </label>
    </div>
@endif
