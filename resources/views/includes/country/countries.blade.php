<style>
    #myUL {
        padding-left: 14px;
        margin-bottom: 0px;
        margin-top: 0px;
        padding-right: 13px;
    }

    .bordered {
        border: 1px solid lightgray;
    }

    .inlink {
        padding: 11px 11px 11px 11px;
        border-right: 1px solid #ccc;
        border-bottom: 1px solid #ccc;
        text-transform: capitalize;
        color: #000;
        font-size: 13px;
        margin: 0;
        text-align: left;
    }
    .inlink a {
        font-size: 15px;
        color: black;
        text-decoration: none;
    }
</style>
<div class="section">
    <div class="container">
        <!-- title start -->
        <div class="titleTop">
            <h3>All Countries</h3>
        </div>
        <!-- title end -->
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row header" style="margin-right: 0px; margin-left:0px;">
                        <div class="col-lg-6 col-12" style="margin-top: 3px; padding-left:0px;">
                            <div class="form-outline">
                                <input style="border-radius: 5px;" type="search" onkeyup="myFunction()"
                                    placeholder="Search your country..." id="myInput" class="form-control" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="mt-4 bordered">
                        <ul id="myUL" class="row">
                            @forelse ($country as $value)
                                <li class="col-lg-2 col-sm-4 inlink" style="list-style: none">
                                    <a title="{{ $value->country }}"
                                        href="{{ url('/jobs-in-'. $value->slug) }}">{{ $value->country }}</a>
                                </li>
                            @empty
                                <div class="col-lg-12 text-center">
                                    <p class="fontsize mt-2">No Available Country</p>
                                </div>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function myFunction() {
        var input, filter, ul, li, a, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        ul = document.getElementById("myUL");
        li = ul.getElementsByTagName("li");
        for (i = 0; i < li.length; i++) {
            a = li[i].getElementsByTagName("a")[0];
            txtValue = a.textContent || a.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
            } else {
                li[i].style.display = "none";
            }
        }
    }
</script>
