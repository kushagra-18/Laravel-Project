<!-- echo $cartItemsShow -->
<ul class="list-group mb-3">
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$cartItemsShow[0]->title}}</h6>
                            <small class="text-muted">{{$cartItemsShow[0]->category}}</small>
                        </div>
                        <span class="text-muted">{{$cartItemsShow[0]->price_revised}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (INR)</span>
                        <strong>{{$cartItemsShow[0]->price_revised}}</strong>
                    </li>
                </ul>
        