<div class="shop-address-app">
    <select v-model="selectedAddress" class="form-select" required>
        <option disabled value="">Chọn nhà hàng</option> <!-- Default option -->
        <option v-for="address in store_address" :key="address.name" :value="address">@{{ address.name }}</option>
    </select>
    
    <div v-if="selectedAddress">
        <div style="margin: 10px 0">
            <strong style="font-size: 16px"> Địa chỉ: </strong>
            <span>@{{ selectedAddress.address }}</span>
        </div>
        
        <a :href="selectedAddress.link_map" target="_blank">Xem bản đồ</a>
        
        <div class="form-group mt-2">
            <label for="recipientName">Tên người nhận</label>
            <input v-model="recipientName" type="text" id="recipientName" class="form-control" placeholder="Tên người nhận">
        </div>
        <div class="form-group mt-2">
            <label for="phoneNumber">Số điện thoại</label>
            <input v-model="phoneNumber" type="number" id="phoneNumber" class="form-control" placeholder="Số điện thoại">
        </div>

        <div class="form-group mt-2">
            <label for="timeSlot">Chọn thời gian</label>
            <select v-model="selectedTimeSlot" id="timeSlot" class="form-select">
                <option disabled value="">Chọn giờ nhận hàng</option> <!-- Default option -->
                <option v-for="slot in getTimeSlots()" :key="slot" :value="slot">@{{ slot }}</option>
            </select>
        </div>
        <button @click="updateShopAddress" class="btn btn-primary mt-2">Lưu</button>
    </div>
</div>

<script>
let shopAddressApp = new Vue({
    el: '.shop-address-app',    
    data: {
        store_address: @json($store_address),
        selectedAddress: "",  // Default to no selection
        selectedTimeSlot: "",  // Default to no selection
        recipientName: "",     // New field for recipient's name
        phoneNumber: ""        // New field for recipient's phone number
    },
    watch: {
        selectedAddress(newAddress, oldAddress) {
            // Reset time slot whenever the selected address changes
            this.selectedTimeSlot = "";
        }
    },
    methods: {
        getTimeSlots() {
            if (this.selectedAddress) {
                // Combine all time slots from the selected address's time_slots array
                return [].concat(...this.selectedAddress.time_slots);
            }
            return [];
        },
        updateShopAddress(){
            $http.put('/checkout', {
                pick_up_address: this.selectedAddress.address,
                pick_up_time: this.selectedTimeSlot,
                name: this.recipientName,    // Add recipient name
                phone: this.phoneNumber      // Add recipient phone number
            }).then(response => {
                // Handle the response here
                console.log('Success:', response);
            }).catch(error => {
                // Handle the error here
                console.error('Error:', error);
            });
        }
    }
})
</script>
