<template>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header">
                        <div class="d-flex flex-row justify-content-between align-items-center gap-3">
                            <h6 class="text-body text-xs font-weight-bolder mt-2 mb-2">Export Data</h6>
                            <div class="d-flex flex-row justify-content-end mb-2 mt-2 gap-1">
                                <button class="btn btn-success btn-sm" @click="exportKeluhan('csv')">CSV</button>
                                <button class="btn btn-danger btn-sm" @click="exportKeluhan('pdf')">PDF</button>
                                <button class="btn btn-warning btn-sm" @click="exportKeluhan('txt')">TXT</button>
                                <button class="btn btn-info btn-sm" @click="exportKeluhan('xls')">XLS</button>
                            </div>
                        </div>
                    </div>

	                <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor HP</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Keluhan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keluhan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="item in items" :key="item.id">
                                        <td>
                                            <div>
                                                <span>{{ item.id }}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ item.nama }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ item.email }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ item.nomor_hp }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">
                                            {{ item.status_keluhan === '0' ? 'Received' : item.status_keluhan === '1' ? 'In Progress' : item.status_keluhan === '2' ? 'Done' : 'Unknown Status' }}
                                        </p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0 text-truncate" :title="item.keluhan">{{ item.keluhan }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm font-weight-bold mb-0">{{ formatDate(item.created_at) }}</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
    import axios from 'axios';

    export default {
        data() {
            return {
                items: [],
                url: ''
            }
        },
        mounted() {
            this.fetchData();
        },
        methods: {
            fetchData() {
                axios.get('/api/export-keluhan-pelanggan')
                    .then(response => {
                        this.items = response.data;
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
            formatDate(dateString) {
                const date = new Date(dateString);
				const options = {
					year: 'numeric',
					month: '2-digit',
					day: '2-digit',
					hour: '2-digit',
					minute: '2-digit',
					hour12: false, 
				};

				const formattedDate = date.toLocaleString(undefined, options);
				return formattedDate.replace(',', '').replace(/\//g, '/'); 
            },
            exportKeluhan(format) {
                const url = `/keluhan-pelanggan/export?format=${format}`;
                axios({
                    url,
                    method: 'GET',
                    responseType: 'blob'
                })
                .then(response => {
                    const url = window.URL.createObjectURL(new Blob([response.data]));
                    const link = document.createElement('a');
                    link.href = url;
                    link.setAttribute('download', `keluhan-pelanggan.${format}`);
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                })
                .catch((error) => {
                    console.error("Error exporting data:", error);
                });
            }
        }
    }
</script>
<style scoped>
    .table-responsive {
		overflow-x: auto; 
	}
	.table td, .table th {
		white-space: nowrap; 
		overflow: hidden; 
		text-overflow: ellipsis; 
		max-width: 25ch; 
	}

	.text-truncate {
		overflow: hidden;
		white-space: nowrap;
		text-overflow: ellipsis;
	}
</style>