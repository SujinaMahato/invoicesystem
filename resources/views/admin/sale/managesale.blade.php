@include('admin.includes.header')
@section('content')
        
        <!-- Date Section -->
        <div class="p-4 mb-6 bg-white rounded-lg shadow-lg">
            <div class="flex items-center space-x-4">
                <!-- Start Date -->
                <div class="flex items-center space-x-2">
                    <label for="start-date" class="font-medium text-gray-700">Start Date</label>
                    <input type="date" id="start-date" class="p-2 border border-gray-300 rounded-md">
                </div>
                <!-- End Date -->
                <div class="flex items-center space-x-2">
                    <label for="end-date" class="font-medium text-gray-700">End Date</label>
                    <input type="date" id="end-date" class="p-2 border border-gray-300 rounded-md">
                </div>
                <!-- Find Button -->
                <button class="px-6 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">Find</button>
            </div>
        </div>

        <!-- Manage Sale Section -->
        <div class="p-4 bg-white rounded-lg shadow-lg">
            <!-- Manage Sale Header with Buttons -->
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-xl font-semibold text-gray-800">Manage Sale</h2>
                <div class="space-x-2">
                    <button class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">+ New Sale</button>
                    <button class="px-4 py-2 text-white bg-green-500 rounded-md hover:bg-green-600">+ POS Sale</button>
                </div>
            </div>

            <!-- Show Entries and Search Input -->
            <div class="flex items-center justify-between mb-4">
                <!-- Show Entries -->
                <div class="flex items-center space-x-2">
                    <label for="entries" class="text-sm text-gray-600">Show</label>
                    <select id="entries" class="p-2 border border-gray-300 rounded-md">
                        <option>10</option>
                        <option>25</option>
                        <option>50</option>
                        <option>100</option>
                    </select>
                    <span class="text-sm text-gray-600">entries</span>
                </div>

                <!-- Search Input -->
                <div>
                    <input type="text" placeholder="Search" class="p-2 border border-gray-300 rounded-md">
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">SL.</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Invoice No</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Sale By</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Customer Name</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Date</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Total Amount</th>
                            <th class="px-4 py-2 text-xs font-medium tracking-wider text-left text-gray-500 uppercase">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7" class="px-6 py-4 font-medium text-right text-gray-500">Total:</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Export Buttons -->
            <div class="flex items-center justify-between mt-4">
                <div class="space-x-2">
                    <button class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">Copy</button>
                    <button class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">CSV</button>
                    <button class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">Excel</button>
                    <button class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">PDF</button>
                    <button class="px-4 py-2 text-white bg-purple-600 rounded-md hover:bg-green-700">Print</button>
                </div>
            </div>
        </div>
    </div>
    @endsection
