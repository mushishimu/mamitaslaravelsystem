<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/5bf9be4e76.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    @vite('resources/css/app.css')
    <title>Back Office</title>
</head>
<body class="w-full h-screen overflow-hidden bg-[#f2f2f2]">
    <div class="w-full flex items-center h-[7%] bg-[#db121c] px-10">
        <p class="text-lg font-medium text-white">Sales by item</p>
    </div>
    <div class="w-full h-[93%] flex ">
        <div class="w-[5%] pt-10 bg-[#fefefe]">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center pb-4 mb-3">
                <img src="{{ asset($cms->company_logo) }}" alt="">
            </div>
            <div class="w-full relative">
                <button onclick="openDashboard()" class="w-full flex items-center justify-center h-auto py-4 bg-[#f5a7a4]">
                    <img src="{{asset('images/chart-red.png')}}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="dash_options" class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 text-sm">
                    <div class="w-full flex flex-col py-2">
                        <a href="{{route('office.dashboard')}}" class="hover:bg-[#e6e6e6] p-2">Sales summary</a>
                        <a href="{{route('office.sales_by_item')}}" class="hover:bg-[#e6e6e6] p-2">Sales by item</a>
                        <a href="{{route('office.sales_history')}}" class="hover:bg-[#e6e6e6] p-2">Sales history</a>
                    </div>
                </div>
            </div>
            <div class="w-full relative">
                <a href="{{route('office.items_list')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/prod-new.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <button onclick="openInventoryOptions()" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/inv-new.png')}}" alt="" class="w-[30px] h-auto">
                </button>
                <div id="inventory_options" class="hidden w-[200px] absolute left-20 top-0 z-10 bg-slate-50 p-3 text-sm">
                    <div class="w-full flex flex-col gap-3">
                        <a href="{{route('office.stocks_adjustment')}}">Stocks Adjustment</a>
                        <a href="{{route('office.inventory')}}">Inventory</a>
                    </div>
                </div>
            </div>
            {{-- <div class="w-full relative">
                <a href="{{route('qr_printing')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/qr.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div> --}}
            <div class="w-full relative">
                <a href="{{route('office.cashiers')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/employee-new.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{route('office.supplier')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/supplier-new.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{route('office.ordering')}}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{asset('images/order-new.png')}}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <a href="{{ route('office.cms') }}" class="w-full flex items-center justify-center h-auto py-4">
                    <img src="{{ asset('images/cms.png') }}" alt="" class="w-[30px] h-auto">
                </a>
            </div>
            <div class="w-full relative">
                <form id="logoutForm" action="{{ route('office.logout') }}" method="POST">
                    @csrf
                    <a href="#" id="logoutLink" class="w-full flex items-center justify-center h-auto py-4">
                        <img src="{{ asset('images/logout-new.png') }}" alt="Logout" class="w-[30px] h-auto">
                    </a>
                </form>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                document.getElementById('logoutLink').addEventListener('click', function(e) {
                    e.preventDefault(); // Prevent the default link action

                    Swal.fire({
                        title: "Are you sure?",
                        text: "You will be logged out of the system.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#3085d6",
                        cancelButtonColor: "#d33",
                        confirmButtonText: "Yes, log me out!"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // Submit the logout form
                            document.getElementById('logoutForm').submit();
                        }
                    });
                });
            </script>
        </div>
        <div class="w-[95%] p-7 h-screen overflow-auto">
            <div class="w-full">
                <div class="mb-10">
                    <div class="w-full bg-white p-6 flex gap-2">
                        <div class="w-1/2 border-r-2 pr-2">
                            <p id="item" class="mb-5 font-semibold">Top 10 most sold items for the month of <span id="month">July</span></p>
                            <div class="w-full flex flex-col gap-2 items-start">
                              @foreach ($topItems as $topItem)
                                  <button id="items"  data-val="{{$topItem->food_name}}" class="w-full py-1 text-start border-b">{{$topItem->food_name}}</button>
                              @endforeach
                            </div>
                        </div>
                        <div class="w-1/2 px-5">
                            {{-- <canvas id="myChart" class="w-full"></canvas> --}}
                            <p id="item" class="mb-5 font-semibold">Top 10 least sold items for the month of <span id="month">July</span></p>
                            <div class="w-full flex flex-col gap-2 items-start">
                              @foreach ($leastItems as $leastItem)
                                  <button id="items"  data-val="{{$leastItem->food_name}}" class="w-full py-1 text-start border-b">{{$leastItem->food_name}}</button>
                              @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-10">
                    <div class="w-full bg-white p-6 flex gap-2">
                        <canvas id="myChart" class="w-full"></canvas>
                    </div>
                </div>
                @if(session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('error') }}</span>
                    </div>
                @endif
                <div class="w-full flex justify-end mb-4">
                    <a href="{{ route('office.export.sales_by_items') }}" 
                       class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M6 2a2 2 0 00-2 2v12a2 2 0 002 2h8a2 2 0 002-2V7.414A2 2 0 0015.414 6L12 2.586A2 2 0 0010.586 2H6zm5 6a1 1 0 10-2 0v3.586l-1.293-1.293a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l3-3a1 1 0 00-1.414-1.414L11 11.586V8z" clip-rule="evenodd" />
                        </svg>
                        Export to Excel
                    </a>
                </div>
                <div class="w-full p-6 bg-white mb-10">
                    <div class="w-full flex items-center py-3 border-y text-sm text-gray-400 font-medium">
                        <p class="w-[40%]">Item</p>
                        <p class="w-[15%] text-right">Items sold</p>
                        <p class="w-[15%] text-right">Net sales</p>
                        <p class="w-[15%] text-right">Item cost</p>
                        <p class="w-[15%] text-right">Gross profit</p>
                    </div>
                    <div class="w-full">
                        @foreach ($items as $item)
                            <div class="w-full flex items-center py-3 border-b">
                                <p class="w-[40%]">{{ $item->food_name }}</p>
                                <p class="w-[15%] text-right">{{ $item->occurrence }}</p>
                                <p class="w-[15%] text-right">&#8369;{{ ($item->retail * $item->occurrence) - (($item->retail * $item->occurrence) * .12)}}</p>
                                <p class="w-[15%] text-right">&#8369;{{ $item->cost * $item->occurrence }}</p>
                                <p class="w-[15%] text-right">&#8369;
                                    {{
                                        (($item->retail * $item->occurrence) - (($item->retail * $item->occurrence) * .12)) - ($item->cost * $item->occurrence)
                                    }}
                                </p>
                            </div>
                        @endforeach
                        <div class="w-full flex items-center gap-10 pt-4 px-6 text-sm text-gray-500">
                            {{ $items->links() }}
                            <div class="flex items-center gap-1 w-[8%]">
                                <p>Page: {{ $items->currentPage() }}</p>
                                <p>of {{ $items->lastPage() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
          const ctx = document.getElementById('myChart').getContext('2d');
          
          // Extracting item names and occurrence counts from PHP and formatting them for JavaScript
          const itemNames = {!! json_encode($topItems->pluck('food_name')) !!};
          const itemOccurrences = {!! json_encode($topItems->pluck('occurrence')) !!};
      
          // Example sales data for the top items
          const datasets = [{
              label: 'Sold item for this month',
              data: itemOccurrences,
              backgroundColor: 'rgba(255, 99, 132, 0.5)',
              borderColor: 'rgba(255, 99, 132, 1)',
              borderWidth: 1
          }];
      
          new Chart(ctx, {
              type: 'bar',
              data: {
                  labels: itemNames,
                  datasets: datasets
              },
              options: {
                  scales: {
                      y: {
                          beginAtZero: true,
                          stacked: true
                      },
                      x: {
                          stacked: true
                      }
                  }
              }
          });
      </script>
        
    </div>
    <script>
      $(document).ready(function() {
          // Attach click event handler to buttons with data-val attribute
          $("button[data-val]").click(function() {
              // Get the value of the data-val attribute
              var buttonValue = $(this).data("val");
              // Do something with the buttonValue, for example, log it to the console
              var url = "{{ route('office.item_name', ['item_name' => ':item_name']) }}";
              url = url.replace(':item_name', buttonValue);
              alert(url); // This is just for testing purposes
              
              // AJAX request
              $.ajax({
    url: url,
    method: "GET",
    success: function(response) {
        console.log(response);
        $('#month').textContent = response.month;
        // Extract labels (dates) and data (counts) from the response
        var labels = Object.keys(response.summed_counts);
        var data = Object.values(response.summed_counts);

        // Get the canvas context
        var ctx = document.getElementById('myChart').getContext('2d');
        
        // Check if the chart exists
        var existingChart = Chart.getChart(ctx);
        if (existingChart) {
            // If the chart exists, destroy it
            existingChart.destroy();
        }

        // Create a new chart
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: buttonValue + 'Item sold on this day', // Provide a label for the dataset
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    },
    error: function(xhr, status, error) {
        // Handle error response here
    }
});

          });
      });



        function openInventoryOptions(){
            var inventoryOptions = document.getElementById('inventory_options')
            inventoryOptions.classList.toggle('hidden')
        }

        function openDashboard(){
            var inventoryOptions = document.getElementById('dash_options')
            inventoryOptions.classList.toggle('hidden')
        }

        function openItems(){
            var inventoryOptions = document.getElementById('items_options')
            inventoryOptions.classList.toggle('hidden')
        }
    </script>
    </script>
</body>
</html>