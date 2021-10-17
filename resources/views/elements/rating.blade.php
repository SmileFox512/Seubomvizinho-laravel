@if ($rating > 0)
    @if ($rating > 0)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif

    @if ($rating > 1)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif

    @if ($rating > 2)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif

    @if ($rating > 3)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif

    @if ($rating > 4)
        <span class="fa fa-star checked"></span>
    @else
        <span class="fa fa-star"></span>
    @endif
@endif
