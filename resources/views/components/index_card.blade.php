<div class="col-xl-12 mt">
    <div class="card">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0 text-primary">{!! $title ?? '' !!}</h5>
                </div>
                <div class="col text-right">
                    {!! $action ?? '' !!}    
                </div>
            </div>
        </div> <hr>
        <div class="card-body table-responsive">
            {!! $bodycard ?? '' !!}
        </div>
    </div>
</div>