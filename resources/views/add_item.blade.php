<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="{{ asset('jquery/jquery.js') }}"></script>
    @vite('resources/css/app.css')
    <title>Dashboard</title>
</head>

<body class="w-full h-auto bg-[#ffd962]">
    <div id="success_popup"
        class="hidden bg-white w-1/4 px-7 py-11 rounded-lg absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50">
        <p class="text-3xl text-green-500 font-medium text-center mb-4">Success!</p>
        <p class="text-sm text-[#8e8f8e] text-center">Added to items to be reviewed.</p>
    </div>
    {{-- Top bar --}}
    {{-- <div class="w-full flex items-center h-[8%] px-20 border-b border-bd">
        <div class="w-1/6">
            <div class="">
                <img src="{{asset('images/logo2.png')}}" alt="" class="w-1/2">
            </div>
        </div>
    </div> --}}
    {{-- main --}}
    <div id="main" class="w-full flex h-full z-0">
        {{-- navigations --}}
        <div class="w-[6%] py-6 bg-white">
            <div class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 mb-3">
                <img src="{{ asset('images/logo-transparent.png') }}" alt="">
            </div>
            <a href="{{ route('dashboard') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/products-new.png') }}" alt="Home Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Home</p>
            </a>
            <a href="{{ route('cashier') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/cashier-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Cashier</p>
            </a>
            <a href="{{ route('history') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/history-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">History</p>
            </a>
            {{-- <a href="{{ route('inventory') }}"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4 rounded-xl bg-[#f5a7a4]">
                <img src="{{ asset('images/inv-red.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#e5231a]">Inventory</p>
            </a> --}}
            <a href="{{ route('orders') }}" class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/order-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Orders</p>
            </a>
            <a href="{{ route('office.login') }}" target="__blank"
                class="flex w-2/3 mx-auto flex-col items-center justify-center py-4">
                <img src="{{ asset('images/backoffice-new.png') }}" alt="Cashier Icon" class="w-1/3">
                <p class="text-xs text-[#565857]">Office</p>
            </a>
        </div>
        <div class="w-[95%] bg-[#f2f2f2] z-0 p-7">
            <div class="w-2/3 flex mx-auto shadow-md text-sm">
                <form id="itemForm" action="{{ route('office.add_item') }}" class="w-full" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class=" bg-white rounded-md p-10 mb-5">
                        <div class="w-full flex items-center justify-between gap-5 mb-10">
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">Item Name</label>
                                <input type="text" name="item_name"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main"
                                    required>
                            </div>
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">SKU</label>
                                <input type="text" name="item_sku"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main"
                                    required>
                            </div>

                        </div>

                        <div class="w-full flex items-center justify-between gap-5 mb-10">
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">Supplier</label>
                                <select name="supplier"
                                    class="w-full mt-1 p-2 border border-[#eaeaea] focus:border-main outline-none rounded-md">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->name }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="w-1/2">
                                <label for="expiration_date">Expiration Date</label>
                                <input type="date" name="expiration_date" id="expiration_date"
                                    class="w-full rounded-xl outline-none border border-[#bebebe] focus:border focus:border-main px-4 py-2 mb-3"
                                    min="{{ date('Y-m-d') }}">
                            </div>
                        </div>

                        <div class="w-full flex items-center justify-between gap-5 mb-10">
                            <div class="w-full">
                                <label for="" class="text-gray-500">Description</label>
                                <textarea id="message" rows="4" name="item_description"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your product description here..."></textarea>
                            </div>
                        </div>

                        <div class="w-full flex items-center justify-between gap-5 mb-10">
                            <div class="w-full">
                                <label for="" class="text-gray-500">Product Ad-ons Promo</label>
                                <textarea id="message" rows="4" name="item_promo"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Write your product promo here..."></textarea>
                            </div>
                        </div>

                        <div class="w-full flex items-center justify-between gap-5 mb-10">
                            <div class="w-1/3">
                                <label for="" class="text-gray-500">Color</label>
                                <input type="text" name="color"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                            </div>
                            <div class="w-1/3 flex items-end">
                                <div class="w-1/2">
                                    <label for="" class="text-gray-500">Size</label>
                                    <input type="text" name="size"
                                        class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                                </div>
                                <div class="w-1/2">
                                    <select name="size_legend" id=""
                                        class="w-full mt-1 px-2 py-2 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                                        <option value="g">Grams (g)</option>
                                        <option value="kg">Kilograms (kg)</option>
                                        <option value="ml">Milliliters (ml)</option>
                                        <option value="l">Liters (l)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="w-1/3">
                                <label for="" class="text-gray-500">Select Category</label>
                                <select name="category" id=""
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                                    <option value="Dry Goods">Dry Goods</option>
                                    <option value="Wet Goods">Wet Goods</option>
                                    <option value="Groceries">Groceries</option>
                                    <option value="Meals">Meals</option>
                                    <option value="Limited Edition">Limited Edition</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-full flex items-center justify-between gap-5">
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">Product unit</label>
                                <select name="product_unit"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                                    <option value="pc">Per pc</option>
                                    <option value="kg">Per kg</option>
                                    <option value="pack">Per pack</option>
                                    <option value="sack">Per sack</option>
                                    <option value="box">Per box</option>
                                    <option value="case">Per case</option>
                                    <option value="gallon">Per gallon</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label for="barcode_option" class="text-gray-500">Barcode Option</label>
                                <select id="barcode_option"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                                    <option value="no">No Barcode</option>
                                    <option value="yes">Have Barcode</option>
                                </select>
                            </div>
                            <div class="w-1/2">
                                <label for="item_barcode" class="text-gray-500">Barcode</label>
                                <input type="text" id="item_barcode" name="item_barcode"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main"
                                    value="N/A" readonly>
                            </div>

                            <script>
                                document.addEventListener('DOMContentLoaded', function () {
                                    const barcodeOption = document.getElementById('barcode_option');
                                    const barcodeInput = document.getElementById('item_barcode');

                                    barcodeOption.addEventListener('change', function () {
                                        if (this.value === 'no') {
                                            barcodeInput.value = 'N/A';
                                            barcodeInput.readOnly = true;
                                        } else {
                                            barcodeInput.value = '';
                                            barcodeInput.readOnly = false;
                                            barcodeInput.focus();
                                        }
                                    });
                                });
                            </script>

                        </div>
                    </div>
                    <div class=" bg-white rounded-md p-10">
                        <div class="w-full flex items-center justify-between gap-16 mb-10">
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">Purchase Cost</label>
                                <input type="number" name="cost" step="any" id="purchase_cost"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                            </div>
                            <div class="w-1/2">
                                <label for="" class="text-gray-500">Retail Value</label>
                                <input type="number" name="retail" id="retail_value"
                                    class="w-full mt-1 px-2 py-1 outline-none border-b-2 bg-slate-50 border-[#eaeaea] focus:border-b-2 focus:border-main">
                            </div>
                        </div>
                        <div class="w-ful flex gap-16">
                            <div class="w-1/2">
                                <label for="item_image" class="text-gray-500 block mb-2">Change Item Image</label>
                                <div class="items-center space-x-4">
                                    <!-- Image Preview -->
                                    <div
                                        class="w-32 h-32 bg-gray-100 border rounded-md overflow-hidden flex items-center justify-center">
                                        <img id="imagePreview" class="w-full h-full object-cover hidden"
                                            alt="Image Preview">
                                    </div>
                                    <!-- File Input -->
                                    <input type="file" name="item_image" id="item_image"
                                        class="mt-4 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
                                        accept="image/*" onchange="previewImage(event)">
                                </div>
                            </div>
                            <script>
                                function previewImage(event) {
                                    const input = event.target;
                                    const preview = document.getElementById('imagePreview');

                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            preview.src = e.target.result;
                                            preview.classList.remove('hidden');
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>

                        </div>
                        <div class="w-1/2 flex gap-5 items-center justify-end">
                            <button type="submit" id="submitButton"
                                class="w-[100px] bg-main uppercase rounded-sm py-2 shadow-md font-medium text-white text-xs">
                                Add Item
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('submitButton').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = document.getElementById('itemForm');
            const purchaseCostInput = document.getElementById('purchase_cost');
            const retailValueInput = document.getElementById('retail_value');

            const purchaseCost = parseFloat(purchaseCostInput.value);
            const retailValue = parseFloat(retailValueInput.value);

            // Validation check: required fields
            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            // Custom validation: Purchase Cost must not exceed Retail Value
            if (purchaseCost > retailValue) {
                Swal.fire({
                    title: "Validation Error!",
                    text: "Purchase Cost cannot be greater than Retail Value.",
                    icon: "error",
                    confirmButtonColor: "#d33",
                });
                return;
            }

            // Show the success popup
            Swal.fire({
                title: "Success!",
                text: "Your item has been added successfully.",
                icon: "success",
                confirmButtonColor: "#3085d6",
                timer: 1500,
                showConfirmButton: false
            }).then(() => {
                form.submit(); // Submit the form
            });
        });

        $(document).ready(function() {
            $('#item_search').on('keyup', function() {
                var key = $(this).val();
                var url = '{{ route('item_search', ['key' => ':key']) }}';
                url = url.replace(':key', key);

                $.ajax({
                    url: url,
                    method: 'GET',
                    success: function(response) {
                        var itemDiv = $('#search_result');
                        itemDiv.empty();

                        response.menus.forEach(function(menu) {
                            var quantityClass = '';
                            var quantityText = '';

                            if (menu.quantity >= 100) {
                                quantityClass = 'text-green-500 font-medium';
                                quantityText = 'High amount';
                            } else if (menu.quantity >= 50) {
                                quantityClass = 'text-blue-500 font-medium';
                                quantityText = 'Good amount';
                            } else if (menu.quantity >= 20) {
                                quantityClass = 'text-orange-500 font-medium';
                                quantityText = 'Low amount';
                            } else if (menu.quantity >= 1) {
                                quantityClass = 'text-red-500 font-medium';
                                quantityText = 'Critically low amount';
                            } else if (menu.quantity == 0) {
                                quantityClass = 'text-red-500 font-medium';
                                quantityText = 'No stocks';
                            }

                            var itemList = `
                            <div class='w-full flex items-center text-sm py-4 px-5 text-gray-700 border-b border-[#dadada] text-left'>
                                <p class='w-[40%]'>${menu.item}</p>
                                <p class='w-[10%] text-right'>${menu.quantity}</p>
                                <p class='w-[15%] ${quantityClass} text-right'>${quantityText}</p>
                                <p class='w-[15%] text-right'>${new Date(menu.updated_at).toLocaleString()}</p>
                                <p class='w-[20%] text-right'>${menu.update_reason}</p>
                            </div>
                        `;
                            itemDiv.append(itemList);
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            });
        });
    </script>


</body>

</html>
