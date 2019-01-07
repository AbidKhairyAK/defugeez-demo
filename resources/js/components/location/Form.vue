<template>
  <div class="row">
    <div v-if="display_province" :class="['form-group', grid]">
      <label class="control-label font-weight-bold">Provinsi</label>
      <select @change="province" v-model="state.province" :class="['form-control select2', {'is-invalid' : error_province}]" name="province_id">
        <option value=""></option>
        <option v-for="province in provinces" :value="province.id">
          {{ province.name }}
        </option>
      </select>
      <span v-if="error_province" class="invalid-feedback">
        {{ error_province }}
      </span>
    </div>

    <div v-if="display_regency" :class="['form-group', grid]">
      <label class="control-label font-weight-bold">Kota/kabupaten</label>
      <select @change="regency" v-model="state.regency" :class="['form-control select2', {'is-invalid' : error_regency}]" name="regency_id">
        <option value=""></option>
        <option v-for="regency in regencies" :value="regency.id">
          {{ regency.name }}
        </option>
      </select>
      <span v-if="error_regency" class="invalid-feedback">
        {{ error_regency }}
      </span>
    </div>

    <div v-if="display_district" :class="['form-group', grid]">
      <label class="control-label font-weight-bold">Kecamatan</label>
      <select @change="district" v-model="state.district" :class="['form-control select2', {'is-invalid' : error_district}]" name="district_id">
        <option value=""></option>
        <option v-for="district in districts" :value="district.id">
          {{ district.name }}
        </option>
      </select>
      <span v-if="error_district" class="invalid-feedback">
        {{ error_district }}
      </span>
    </div>

    <div v-if="display_village" :class="['form-group', grid]">
      <label class="control-label font-weight-bold">Kelurahan/Desa</label>
      <select v-model="state.village" :class="['form-control select2', {'is-invalid' : error_village}]" name="village_id">
        <option value=""></option>
        <option v-for="village in villages" :value="village.id">
          {{ village.name }}
        </option>
      </select>
      <span v-if="error_village" class="invalid-feedback">
        {{ error_village }}
      </span>
    </div>
  </div>
</template>
<script>
  export default {
    name: 'LocationForm',
    props: {
      province_id: {
        default: 0,
      },
      regency_id: {
        default: 0,
      },
      district_id: {
        default: 0,
      },
      village_id: {
        default: 0,
      },
      grid: {
        default: 'col-md-3',
      },
      display_province: {
        default: false,
      },
      display_regency: {
        default: false,
      },
      display_district: {
        default: false,
      },
      display_village: {
        default: false,
      },
      error_province: {
        default: null,
      },
      error_regency: {
        default: null,
      },
      error_district: {
        default: null,
      },
      error_village: {
        default: null,
      },
    },
    data() {
      return {
        alert: {},
        errors: [],
        state: {
          province: '',
          regency: '',
          district: '',
          village: '',
        },
        provinces: [],
        regencies: [],
        districts: [],
        villages: []
      }
    },
    mounted() {
      // get all provinces data
      axios.get('/location/province').then(response => {
        this.provinces = response.data;
      }).catch(error => console.error(error));

      if (this.province_id) {
        this.state.province = this.province_id;
        this.state.regency = this.regency_id;
        this.state.district = this.district_id;
        this.state.village = this.village_id;

        const params = {
          province: this.state.province,
          regency: this.state.regency,
          district: this.state.district
        }
        
        axios.get('/location/regency', {params}).then(response => {
          this.regencies = response.data;
        }).catch(error => console.error(error));

        axios.get('/location/district', {params}).then(response => {
          this.districts = response.data;
        }).catch(error => console.error(error));

        axios.get('/location/village', {params}).then(response => {
          this.villages = response.data;
        }).catch(error => console.error(error));
      }
    },
    methods: {
      province() {
        this.state.regency = '';
        this.state.district = '';
        this.state.village = '';
        // set params
        const params = {
          province: this.state.province
        }
        // url /location/regency?province=xxx
        axios.get('/location/regency', {params}).then(response => {
          this.regencies = response.data;
          this.districts = [];
          this.villages = [];
        }).catch(error => console.error(error));
      },
      regency() {
        this.state.district = '';
        this.state.village = '';
        // set params
        const params = {
          regency: this.state.regency
        };
        axios.get('/location/district', {params}).then(response => {
          this.districts = response.data;
          this.villages = [];
        }).catch(error => console.error(error));
      },
      district() {
        this.state.village = '';
        // set params
        const params = {
          district: this.state.district
        };
        axios.get('/location/village', {params}).then(response => {
          this.villages = response.data;
        }).catch(error => console.error(error));
      }
    }
  }
</script>