    <div class="d-flex flex-row" style="place-content: center">
        <div class="d-flex text-right" style="width: 20%">
            <h4>{{$label}}
                @if ($request == "true")
                    <span style="color: red">*</span>
                @endif
            </h4>
        </div>
        <div class="flex flex-row" style="width: 40%;">
            <input type="text" name="{{$id}}" id="{{$id}}" class="q-form" placeholder="" maxlength="{{$maxlength}}">
            <p class="font-12 mdl-color-text--indigo-A700">{{$text}}</p>
        </div>
    </div>

