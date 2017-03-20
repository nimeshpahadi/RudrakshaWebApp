<div class="container">
    <div class="row form-group">
        <div class="col-xs-10">
            <ul class="nav nav-pills nav-justified thumbnail setup-panel">
                <li @if($active=="info")class="active" @else class="disabled" @endif><a>
                        <h4 class="list-group-item-heading">Product Info</h4>
                        <p class="list-group-item-text">Fill Product information</p>
                    </a></li>
                <li @if($active=="desc")class="active" @else class="disabled" @endif><a>
                        <h4 class="list-group-item-heading">Product Description</h4>
                        <p class="list-group-item-text">Fill Product description</p>
                    </a></li>
                <li @if($active=="image")class="active" @else class="disabled" @endif><a>
                        <h4 class="list-group-item-heading">Product Image</h4>
                        <p class="list-group-item-text">Choose Product images</p>
                    </a></li>
            </ul>
        </div>
    </div>
</div>