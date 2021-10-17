@inject('lang', 'App\Lang')

<div class="sort-by-dropdown d-flex align-items-center mb-xs-10">
    <p class="mr-10"> </p>
    <select name="sort-by" id="sort-by" class="nice-select" onchange="changeSort();">
        <option value="0">{{$lang->get(5)}}</option>        {{--No Sort--}}
        <option value="1">{{$lang->get(6)}}</option>        {{--Sort By Newness--}}
        <option value="2">{{$lang->get(7)}}</option>        {{--Sort By Price: Low to High--}}
        <option value="3">{{$lang->get(8)}}</option>        {{--Sort By Price: High to Low--}}
    </select>
</div>

<script>

    function changeSort(){
        var selectBox = document.getElementById("sort-by");
        var selectedValue = selectBox.options[selectBox.selectedIndex].value;
        sortFood = selectedValue;
        paginationGoPage(1);
    }

</script>
