<template>
	<div class="container">
		<div v-if="alert.show" :class="['alert', alert.type === 'success' ? 'alert-success' : 'alert-danger', 'alert-dismissible', 'fade', 'show']">
			{{ alert.message }}
			<button type="button" class="btn-close" @click="showAlert('', '', false)"></button>
		</div>
	    <div class="row justify-content-center">
	        <div class="col-md-10">
	            <div class="card">
	                <div class="card-header">
						<div class="d-flex flex-row justify-content-end mb-2 mt-2 gap-3">
							<button @click="showKeluhan" class="btn btn-info">Keluhan Pelanggan</button>
							<button @click="showHistory" class="btn btn-secondary"><i class="fas fa-history"></i> History</button>
						</div>
					</div>

	                <div class="card-body">
						<div v-if="view === 'keluhan'">
							<div class="d-flex flex-row justify-content-between align-items-center">
								<div class="d-flex justify-content-start mb-2 mt-2 gap-1">
									<input type="text" v-model="keluhanId" placeholder="Masukkan ID Keluhan" />
									<button class="btn btn-info btn-m mb-0" @click="updateStatus(keluhanId)">Update Status</button>
									<button class="btn btn-danger btn-m mb-0" @click="deleteKeluhanById(keluhanId)">Delete Keluhan</button>
								</div>
								<div class="d-flex justify-content-end mb-2 mt-2 gap-1">
									<button class="btn btn-primary btn-m mb-0" @click="showModal">
										<i class="fas fa-plus"></i> Tambah Keluhan
									</button>
									<button class="btn btn-secondary btn-m mb-0" @click="showExport">
										<i class="fas fa-download"></i> Export Data
									</button>
								</div>
								<!-- button export data -->
								<!-- <div class="dropdown">
									<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
										<i class="fas fa-download"></i> Export Data
									</button>
									<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
										<li><a class="dropdown-item" @click="exportData('txt')">TXT</a></li>
										<li><a class="dropdown-item" @click="exportData('csv')">CSV</a></li>
										<li><a class="dropdown-item" @click="exportData('xlsx')">Excel</a></li>
										<li><a class="dropdown-item" @click="exportData('pdf')">PDF</a></li>
									</ul>
								</div> -->
							</div>
							<div class="table-responsive">
								<table class="table align-items-center mb-0">
									<thead>
										<tr>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Pelanggan</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Email</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nomor HP</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Keluhan</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Keluhan</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
											<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
										</tr>
									</thead>
									<tbody>
										<tr v-for="(item, index) in paginatedKeluhan" :key="item.id">
											<td>
												<div>
													<span>{{ (currentPage - 1) * itemsPerPage + index + 1 }}</span>
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
												<p class="mb-0">
												<button class="btn btn-sm" :class="{
													'btn-success': item.status_keluhan === '2', 
													'btn-warning': item.status_keluhan === '1', 
													'btn-secondary': item.status_keluhan === '0', 
													'btn-light': item.status_keluhan !== '0' && item.status_keluhan !== '1' && item.status_keluhan !== '2'
												}" disabled>
												
												{{ item.status_keluhan === '0' ? 'Received' : item.status_keluhan === '1' ? 'In Progress' : item.status_keluhan === '2' ? 'Done' : 'Unknown Status' }}
												</button>
											</p>
											</td>
											<td>
												<p class="text-sm font-weight-bold mb-0 text-truncate" :title="item.keluhan">{{ item.keluhan }}</p>
											</td>
											<td>
												<p class="text-sm font-weight-bold mb-0">{{ formatDate(item.created_at) }}</p>
											</td>
											<td class="d-flex gap-2">
												<button class="btn btn-sm btn-warning" @click="openEditModal(item)">
													<i class="fas fa-edit text-light"></i>
												</button>
												<button class="btn btn-sm btn-danger" @click="confirmDelete(item.id)">
													<i class="fas fa-trash text-light"></i>
												</button>
											</td>
										</tr>
									</tbody>
								</table>
							</div>
							<nav class="mt-3">
								<ul class="pagination">
									<li class="page-item" :class="{ disabled: currentPage === 1 }">
										<a class="page-link" @click="changePage(currentPage - 1)">Previous</a>
									</li>
									<li
										class="page-item"
										v-for="page in totalPages"
										:key="page"
										:class="{ active: currentPage === page }"
									>
										<a class="page-link" @click="changePage(page)">{{ page }}</a>
									</li>
									<li class="page-item" :class="{ disabled: currentPage === totalPages }">
										<a class="page-link" @click="changePage(currentPage + 1)">Next</a>
									</li>
								</ul>
							</nav>
						</div>
						
						<div v-if="view === 'history'">
							<table class="table align-items-center mb-0">
								<thead>
									<tr>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Keluhan</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Update At</th>
									</tr>
								</thead>
								<tbody>
									<tr v-for="(item, index) in paginatedHistory" :key="item.id">
										<td>
											<div>
												<span>{{ (currentPage - 1) * itemsPerPage + index + 1 }}</span>
											</div>
										</td>
										<td>
											<p class="mb-0">
												<button class="btn btn-sm" :class="{
													'btn-success': item.status_keluhan === '2', 
													'btn-warning': item.status_keluhan === '1', 
													'btn-secondary': item.status_keluhan === '0', 
													'btn-light': item.status_keluhan !== '0' && item.status_keluhan !== '1' && item.status_keluhan !== '2'
												}" disabled>
												
												{{ item.status_keluhan === '0' ? 'Received' : item.status_keluhan === '1' ? 'In Progress' : item.status_keluhan === '2' ? 'Done' : 'Unknown Status' }}
												</button>
											</p>
										</td>
										<td>
											<p class="text-sm font-weight-bold mb-0">{{ formatDate(item.updated_at) }}</p>
										</td>
									</tr>
								</tbody>
							</table>
							<nav class="mt-3">
								<ul class="pagination">
									<li class="page-item" :class="{ disabled: currentPage === 1 }">
										<a class="page-link" @click="changePage(currentPage - 1)">Previous</a>
									</li>
									<li
										class="page-item"
										v-for="page in totalPages"
										:key="page"
										:class="{ active: currentPage === page }"
									>
										<a class="page-link" @click="changePage(page)">{{ page }}</a>
									</li>
									<li class="page-item" :class="{ disabled: currentPage === totalPages }">
										<a class="page-link" @click="changePage(currentPage + 1)">Next</a>
									</li>
								</ul>
							</nav>
						</div>

						<!-- Add Modal -->
						<div v-if="showTambahKeluhanModal" class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
	                        <div class="modal-dialog">
	                            <div class="modal-content">
	                                <div class="modal-header">
	                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Keluhan</h5>
	                                    <button type="button" class="btn-close" @click="closeModal" aria-label="Close"></button>
	                                </div>
	                                <div class="modal-body">
	                                    <form>
	                                        <!-- Tambah input keluhan di sini -->
	                                        <div class="row">
												<div class="form-group mb-2">
													<label for="nama" class="mb-1">Nama</label>
													<input type="text" class="form-control" id="nama" v-model="nama" placeholder="Masukkan Nama">
													<span v-if="errors.nama" class="text-danger">{{ errors.nama[0] }}</span>
												</div>
												<div class="form-group mb-2">
													<label for="email" class="mb-1">Email</label>
													<input type="email" class="form-control" id="email" v-model="email" placeholder="Masukkan Email">
													<span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
												</div>
												<div class="form-group mb-2">
													<label for="nomor_hp" class="mb-1">Nomor HP</label>
													<input type="text" class="form-control" id="nomor_hp" v-model="nomor_hp" placeholder="Masukkan Nomor HP">
													<span v-if="errors.nomor_hp" class="text-danger">{{ errors.nomor_hp[0] }}</span>
												</div>
												<div class="form-group mb-2">
													<label for="status_keluhan" class="mb-1">Status Keluhan</label>
													<select class="form-control" id="status_keluhan" v-model="status_keluhan">
														<option value="0">Received</option>
														<option value="1">In Process</option>
														<option value="2">Done</option>
													</select>
													<span v-if="errors.status_keluhan" class="text-danger">{{ errors.status_keluhan[0] }}</span>
												</div>
												<div class="form-group mb-2">
													<label for="keluhan" class="mb-1">Keluhan</label>
													<textarea class="form-control" id="keluhan" v-model="newKeluhan" placeholder="Masukkan Keluhan"></textarea>
													<span v-if="errors.keluhan" class="text-danger">{{ errors.keluhan[0] }}</span>
												</div>
											</div>
	                                    </form>
	                                </div>
	                                <div class="modal-footer">
	                                    <button type="button" class="btn btn-danger" @click="closeModal">Close</button>
	                                    <button type="button" class="btn btn-primary" @click="addKeluhan">Save Changes</button>
	                                </div>
	                            </div>
	                        </div>
	                    </div>

						<!-- Modal Edit -->
						<div v-if="showEditModal" class="modal fade show" style="display: block;" tabindex="-1" role="dialog" aria-labelledby="editModalLabel">
							<div class="modal-dialog">
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="editModalLabel">Edit Keluhan</h5>
										<button type="button" class="btn-close" @click="closeEditModal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form>
											<div class="mb-3">
												<label for="editNama" class="form-label">Nama</label>
												<input type="text" class="form-control" id="editNama" v-model="editKeluhan.nama" placeholder="Masukkan Nama">
												<span v-if="errors.nama" class="text-danger">{{ errors.nama[0] }}</span>
											</div>
											<div class="mb-3">
												<label for="editEmail" class="form-label">Email</label>
												<input type="email" class="form-control" id="editEmail" v-model="editKeluhan.email" placeholder="Masukkan Email">
												<span v-if="errors.email" class="text-danger">{{ errors.email[0] }}</span>
											</div>
											<div class="mb-3">
												<label for="editNomorHp" class="form-label">Nomor HP</label>
												<input type="text" class="form-control" id="editNomorHp" v-model="editKeluhan.nomor_hp" placeholder="Masukkan Nomor HP">
												<span v-if="errors.nomor_hp" class="text-danger">{{ errors.nomor_hp[0] }}</span>
											</div>
											<div class="mb-3">
												<label for="editStatusKeluhan" class="form-label">Status Keluhan</label>
												<select class="form-control" id="editStatusKeluhan" v-model="editKeluhan.status_keluhan">
													<option value="0">Received</option>
													<option value="1">In Process</option>
													<option value="2">Done</option>
												</select>
												<span v-if="errors.status_keluhan" class="text-danger">{{ errors.status_keluhan[0] }}</span>
											</div>
											<div class="mb-3">
												<label for="editKeluhan" class="form-label">Keluhan</label>
												<textarea class="form-control" id="editKeluhan" v-model="editKeluhan.keluhan" placeholder="Masukkan Keluhan"></textarea>
												<span v-if="errors.keluhan" class="text-danger">{{ errors.keluhan[0] }}</span>
											</div>
										</form>
									</div>
									<div class="modal-footer">
										<button type="button" class="btn btn-secondary" @click="closeEditModal">Close</button>
										<button type="button" class="btn btn-primary" @click="updateKeluhan">Save changes</button>
									</div>
								</div>
							</div>
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
				view: 'keluhan',
				keluhan : [],
				history: [],
				currentPage: 1,
				itemsPerPage: 10,
				nama: '',
				email: '',
				nomor_hp: '',
				status_keluhan: 0,
				newKeluhan: '',
				showTambahKeluhanModal: false,
				showEditModal: false,
				editKeluhan: {},
				errors: {},
				alert: {
					type: '',
					message: '',
					show: false
				},
				keluhanId: '',
				newStatus: '1'
			};
		},
		computed: {
			totalPages() {
				return Math.ceil(this.keluhan.length / 10);
			},
			paginatedKeluhan() {
				const start = (this.currentPage - 1) * this.itemsPerPage;
				return this.keluhan.slice(start, start + this.itemsPerPage);
			},
			paginatedHistory() {
				const start = (this.currentPage - 1) * this.itemsPerPage;
				return this.history.slice(start, start + this.itemsPerPage);
			}
		},
		mounted() {
			this.fetchKeluhan();
		},
		methods: {
			showKeluhan() {
				this.view = 'keluhan';
				this.fetchKeluhan();
			},
			showHistory() {
				this.view = 'history';
				this.fetchHistory();
			},
			showExport() {
				this.$router.push({ name: 'export-keluhan-pelanggan' });
			},
			fetchKeluhan() {
				axios.get('/api/keluhan-pelanggan')
					.then(response => {
						this.keluhan = response.data;
					})
					.catch(error => {
						console.log(error);
					});
			},
			fetchHistory() {
				axios.get('/api/history-keluhan-pelanggan')
					.then(response => {
						this.history = response.data;
					})
					.catch(error => {
						console.log(error);
					});
			},
			changePage(page) {
				if (page < 1 || page > this.totalPages) {
					return;
				}
				this.currentPage = page;
			},
			// exportData(format) {
			// 	const url = `/keluhan-pelanggan/export/${format}`;
			// 	axios({
			// 		url,
			// 		method: 'GET',
			// 		responseType: 'blob', // This is important for file downloads
			// 	})
			// 	.then((response) => {
			// 		// Create a URL for the file and trigger the download
			// 		const url = window.URL.createObjectURL(new Blob([response.data]));
			// 		const link = document.createElement('a');
			// 		link.href = url;
			// 		link.setAttribute('download', `keluhan_pelanggan.${format}`); // Set the file name
			// 		document.body.appendChild(link);
			// 		link.click();
			// 	})
			// 	.catch((error) => {
			// 		console.error("Error exporting data:", error);
			// 	});
			// },
			closeModal() {
				this.showTambahKeluhanModal = false;
			},
			showModal() {
				this.showTambahKeluhanModal = true;
			},
			addKeluhan() {
				axios.post('/api/keluhan-pelanggan', {
					nama: this.nama,
					email: this.email,
					nomor_hp: this.nomor_hp,
					status_keluhan: this.status_keluhan.toString(),
					keluhan: this.newKeluhan
				})
				.then(response => {
					this.keluhan.push(response.data);
					this.closeModal();
					this.resetForm();
					this.errors = {};
					this.showAlert('success', 'Keluhan berhasil ditambahkan');
				})
				.catch(error => {
					if (error.response && error.response.status === 422) {
						this.errors = error.response.data.errors; // Simpan error validasi
					} else {
						console.error('Error:', error);
						this.showAlert('danger', 'Terdapat kesalahan. Silahkan coba lagi');
					}
				});
			},
			resetForm() {
				this.nama = '';
				this.email = '';
				this.nomor_hp = '';
				this.status_keluhan = 0;
				this.newKeluhan = '';
			},
			openEditModal(keluhan) {
				this.editKeluhan = { ...keluhan };
				this.showEditModal = true;
			},
			closeEditModal() {
				this.showEditModal = false;
			},
			updateKeluhan() {
				console.log(this.editKeluhan);
				axios.put(`/api/keluhan-pelanggan/${this.editKeluhan.id}`, this.editKeluhan)
					.then(response => {
						const index = this.keluhan.findIndex(k => k.id === this.editKeluhan.id);
						if (index !== -1) {
							this.keluhan[index] = response.data; // Update tanpa $set
						}
						this.closeEditModal();
						this.showAlert('success', 'Keluhan berhasil diperbarui');
					})
					.catch(error => {
						console.error('Error updating keluhan:', error);
						if (error.response && error.response.status === 422) {
							this.errors = error.response.data.errors;
						} else {
							this.showAlert('danger', 'Terdapat kesalahan saat memperbarui keluhan');
						}
					});
			},
			confirmDelete(id) {
				if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
					this.deleteKeluhan(id);
				}
			},
			deleteKeluhan(id) {
				axios.delete(`/api/keluhan-pelanggan/${id}`)
					.then(response => {
						// Hapus item dari array keluhan
						this.keluhan = this.keluhan.filter(item => item.id !== id);
						this.showAlert('success', 'Keluhan berhasil dihapus');
					})
					.catch(error => {
						console.error('Error:', error);
						this.showAlert('danger', 'Terdapat kesalahan saat menghapus keluhan');
					});
			},
			showAlert(type, message) {
				this.alert.type = type;
				this.alert.message = message;
				this.alert.show = true;
				setTimeout(() => {
					this.alert.show = false;
				}, 3000);
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
			updateStatus(id) {
				axios.put(`/api/keluhan-pelanggan/${id}/status`, {
					status_keluhan: this.newStatus
				})
				.then(response => {
					const index = this.keluhan.findIndex(k => k.id === id);
					if (index !== -1) {
						this.keluhan[index] = response.data;
					}
					this.showAlert('success', 'Status keluhan berhasil diperbarui');
				})
				.catch(error => {
					console.error('Error updating status keluhan:', error);
					this.showAlert('danger', 'Terdapat kesalahan saat memperbarui status keluhan');
				});
			},
			deleteKeluhanById(id) {
				axios.delete(`/api/keluhan-pelanggan/${id}/status`)
					.then(response => {
						this.keluhan = this.keluhan.filter(item => item.id !== id);
						this.showAlert('success', 'Keluhan berhasil dihapus');
					})
					.catch(error => {
						console.error('Error:', error);
						this.showAlert('danger', 'Terdapat kesalahan saat menghapus keluhan');
					});
			}
		}
	};
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