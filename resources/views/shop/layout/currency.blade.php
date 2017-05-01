
{{--<a id="result"></a>--}}
<select id="curen" onchange="change()" type="text">
    <option disabled selected>Currency</option>
    @foreach( Helper::currency() as $t)
        <option  value= {{$t->id}}>{{$t->code}}</option>
    @endforeach

</select>

<script>
    function change() {
        localStorage.currency_id=document.getElementById("curen").value;
        document.getElementById("result").innerHTML =document.getElementById("curen").value;
    }
</script>

