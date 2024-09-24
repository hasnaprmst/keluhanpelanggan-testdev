<template>
	<div class="container">
	    <div class="row justify-content-center">
	        <div class="col-md-12">
	            <div class="card">
	                <div class="card-header">Dashboard</div>

	                <div class="card-body">
	                    <div class="border border-black p-1">
							<div class="container">
								<div class="row align-items-center">
                                    <div class="col-4">
                                        <div class="card">
                                            <div class="card-body">
                                                <canvas id="pieChart"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-8">
                                        <div class="card">
                                            <div class="card-body">
                                                <canvas id="barChart" width="600" height="400"></canvas>
                                            </div>
                                        </div>
                                    </div>
								</div>
                                <div class="row mt-3">
                                    <div class="col-12">
                                        <div class="card px-2">
                                            <h7 class="text-center mb-3 mt-3">Top 10 Keluhan</h7>
                                            <table class="table table-bordered align-items-center mb-2">
                                                <thead>
                                                    <tr>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-normal opacity-7 ps-2">Nama Pelanggan</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-normal opacity-7 ps-2">Email</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-normal opacity-7 ps-2">Created At</th>
                                                        <th class="text-uppercase text-secondary text-xxs font-weight-normal opacity-7 ps-2">Umur Keluhan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="keluhan in topKeluhan" :key="keluhan.id">
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{ keluhan.nama }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{ keluhan.email }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{ formatDate(keluhan.created_at) }}</p>
                                                        </td>
                                                        <td>
                                                            <p class="text-sm font-weight-bold mb-0">{{ keluhan.umur_keluhan }}</p>
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
	            </div>
	        </div>
	    </div>
	</div>
</template>

<script>
import axios from 'axios';
import { Chart, registerables } from 'chart.js';

export default {
    name: "DashboardCharts",
    data() {
        return {
            pieChartData: [],
            pieChartLabels: [],
            barChartData: [],
            barChartLabels: [],
            topKeluhan: []
        };
    },
    mounted() {
        // Registrasi komponen Chart.js
        Chart.register(...registerables);

        axios.get('/api/data-keluhan')
            .then(response => {
                const {dataPieChartKeluhan, dataBarChartKeluhan} = response.data;

                // Pie Chart Data
                this.pieChartLabels = dataPieChartKeluhan.map(item => item.status_keluhan);
                this.pieChartData = dataPieChartKeluhan.map(item => item.total);

                // Bar Chart Data
                this.processBarChartData(dataBarChartKeluhan);

                this.renderPieChart();
                this.renderBarChart();
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
        axios.get('/api/top-10-keluhan')
            .then(response => {
                this.topKeluhan = response.data;
            })
            .catch(error => {
                console.error('Error fetching keluhan data:', error);
            });
    },
    methods: {
        renderPieChart() {
            const ctx = document.getElementById('pieChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie',
                data: {
                labels: this.pieChartLabels,
                datasets: [{
                    data: this.pieChartData,
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(153, 102, 255)',
                        'rgb(255, 159, 64)'
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                    position: 'top',
                    },
                    title: {
                    display: true,
                    text: 'Status Keluhan Pelanggan'
                    }
                }
            }
            });
        },
        processBarChartData(data) {
        const monthNames = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

        let statusData = { '0': [], '1': [], '2': [] };

        data.forEach(item => {
            const monthName = monthNames[item.month - 1];
            const status = item.status_keluhan;

            if (!this.barChartLabels.includes(monthName)) {
            this.barChartLabels.push(monthName);
            }

            if (!statusData[status]) {
            statusData[status] = Array(monthNames.length).fill(0);
            }

            statusData[status][item.month - 1] = item.total;
        });

        this.barChartData = statusData;
        },
        renderBarChart() {
            const ctx = document.getElementById('barChart').getContext('2d');
            const datasets = [
                {
                    label: '0',
                    data: this.barChartData['0'],
                    backgroundColor: 'rgba(54, 162, 235, 0.7)', // Blue
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },
                {
                    label: '1',
                    data: this.barChartData['1'],
                    backgroundColor: 'rgba(255, 99, 132, 0.7)', // Red
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                },
                {
                    label: '2',
                    data: this.barChartData['2'],
                    backgroundColor: 'rgba(153, 102, 255, 0.7)', // Purple
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }
            ];

            new Chart(ctx, {
                type: 'bar',
                data: {
                labels: this.barChartLabels,
                datasets: datasets
                },
                options: {
                scales: {
                    y: {
                    beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                    display: true,
                    position: 'bottom',
                    },
                    title: {
                    display: true,
                    text: 'Time Series by Status Keluhan'
                    }
                },
                responsive: true,
                }
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
        }

    }
};
</script>

<style scoped>
    canvas {
    max-width: 800px;
    margin: 0 auto;
    }
</style>
