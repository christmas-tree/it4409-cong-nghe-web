import React, {Component} from 'react';
import authHeader from '../../services/auth-header';
import axios from 'axios';
import Spinner from "../../user-app/components/shared/Spinner";

export class ManageService extends Component {

  constructor(props) {
    super(props);

    this.state = {
      loading: true,
      services: [],
      serviceOnEdit: {id: 0, name: '', description: '', cost: 0},
      onAddService: false
    }
  }

  componentDidMount() {
    this.setDataTableDemoDestroy();
    this.getServices();
  }

  getServices = () => {
    const config = {
      method: 'get',
      url: 'https://cleaning-service-hust.herokuapp.com/api/admin/services',
      headers: authHeader()
    };

    axios(config)
      .then(response => {
        let services = response.data.data;
        this.setState({
          loading: false,
          services: services
        });
        this.setDataTableDemo();
      })
      .catch(error => {
        console.log(error);
      });
  }

  handleClickAddService = (event) => {
    let service = Object.assign({}, this.state.serviceOnEdit);
    service.id = 0;
    service.name = '';
    service.description = '';
    service.cost = 0;
    this.setState({onAddService: true, serviceOnEdit: service});
  }

  handleClickCloseAddingService = (event) => {
    this.setState({onAddService: false});
  }

  handleChangeAddForm = (event) => {
    let service = Object.assign({}, this.state.serviceOnEdit);
    service[event.target.name] = event.target.value;

    this.setState({serviceOnEdit: service});
  }

  handleSubmitAddOrEdit = (event) => {
    event.preventDefault();

    if (this.state.serviceOnEdit.id === 0) {
      this.addService();
    } else {
      this.editService();
    }
  }
  addService = () => {
    const data = new FormData();
    data.append('name', this.state.serviceOnEdit.name);
    data.append('description', this.state.serviceOnEdit.description);
    data.append('cost', this.state.serviceOnEdit.cost);

    const config = {
      method: 'post',
      url: 'https://cleaning-service-hust.herokuapp.com/api/admin/services',
      headers: authHeader(),
      data: data
    };

    axios(config)
      .then(response => {
        //refetch
        this.getServices();
      })
      .catch(error => {
        console.log(error);
      });
  }

  editService = () => {
    const config = {
      method: 'patch',
      url: 'https://cleaning-service-hust.herokuapp.com/api/admin/services/' + this.state.serviceOnEdit.id,
      headers: authHeader(),
      data: {
        'name': this.state.serviceOnEdit.name,
        'description': this.state.serviceOnEdit.description,
        'cost': this.state.serviceOnEdit.cost
      }
    };

    axios(config)
      .then(response => {
        //refetch
        this.getServices();
      })
      .catch(error => {
        console.log(error);
      });
  }

  removeService = (event) => {
    let serviceId = event.target.getAttribute("data-index");

    const config = {
      method: 'delete',
      url: 'https://cleaning-service-hust.herokuapp.com/api/admin/services/' + serviceId,
      headers: authHeader()
    };

    axios(config)
      .then(response => {
        //refetch
        this.getServices();
      })
      .catch(error => {
        console.log(error);
      });
  }

  showEditForm = (event) => {
    let serviceId = event.target.getAttribute("data-index");
    let service = this.state.services.filter((item) => {
      return item.id == serviceId;
    })[0];
    this.setState({onAddService: true, serviceOnEdit: service});
  }

  setDataTableDemo = () => {
    let script = document.createElement("script");
    script.src = "admin/js/demo/datatables-demo.js";
    script.async = true;
    document.body.appendChild(script);
    document.body.removeChild(script);
  }

  setDataTableDemoDestroy = () => {
    let script = document.createElement("script");
    script.src = "admin/js/demo/datatables-demo-destroy.js";
    script.async = true;
    document.body.appendChild(script);
    document.body.removeChild(script);
  }

  render() {
    const currencyOptions = {
      style: 'currency',
      currency: 'VND',
      maximumFractionDigits: 0
    }

    return (
      <div className="container-fluid">
        <div className="row">
          <div className="col-xs-4 col-sm-4 col-md-4 col-lg-4">
            <button type="button"
                    className="btn btn-primary"
                    data-index={0}
                    hidden={this.state.onAddService}
                    onClick={this.handleClickAddService}>
              Thêm
            </button>
            <button type="button"
                    className="btn btn-danger"
                    data-index={0}
                    hidden={!this.state.onAddService}
                    onClick={this.handleClickCloseAddingService}>
              Đóng
            </button>
            <form onSubmit={this.handleSubmitAddOrEdit}
                  data-index={0}
                  hidden={this.state.onAddService === false}
            >
              <br/>
              <div className="form-group">
                <label>ID:</label>
                <input
                  type="text"
                  className="form-control"
                  name="id"
                  value={this.state.serviceOnEdit.id}
                  onChange={this.handleChangeAddForm}
                  disabled={true}
                />
              </div>
              <div className="form-group">
                <label>Tên:</label>
                <input
                  type="text"
                  className="form-control"
                  name="name"
                  value={this.state.serviceOnEdit.name}
                  onChange={this.handleChangeAddForm}
                  disabled={false}
                />
              </div>
              <div className="form-group">
                <label>Mô tả:</label>
                <input
                  type="text"
                  className="form-control"
                  name="description"
                  value={this.state.serviceOnEdit.description}
                  onChange={this.handleChangeAddForm}
                  disabled={false}
                />
              </div>
              <div className="form-group">
                <label>Giá:</label>
                <input
                  type="number"
                  className="form-control"
                  name="cost"
                  value={this.state.serviceOnEdit.cost}
                  onChange={this.handleChangeAddForm}
                  disabled={false}
                />
              </div>
              <div className="text-center">
                <button type="submit"
                        className="btn btn-warning"
                        data-index={0}>
                  Lưu
                </button>
              </div>
            </form>
          </div>
          <div
            className={this.state.onAddService ? "col-xs-8 col-sm-8 col-md-8 col-lg-8"
              : "col-xs-12 col-sm-12 col-md-12 col-lg-12"}>

            <br/>
            <div className="card shadow mb-4">
              <div className="card-header py-3">
                <h6 className="m-0 font-weight-bold text-primary">Dịch vụ</h6>
              </div>
              <div className="card-body">
                <div className="table-responsive">
                  {this.state.loading ? (
                    <Spinner/>
                  ) : (
                    <table className="table table-bordered" id="dataTable"
                           width="100%" cellSpacing={0}>
                      <thead>
                      <tr>
                        <th>ID</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                      </tr>
                      </thead>
                      <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Tên</th>
                        <th>Mô tả</th>
                        <th>Giá</th>
                        <th>Chỉnh sửa</th>
                        <th>Xóa</th>
                      </tr>
                      </tfoot>
                      <tbody>
                      {this.state.services.map(service =>
                        <tr key={service.id}>
                          <td>{service.id}</td>
                          <td>{new Date(service.created_at).toLocaleString('vi-vn')}</td>
                          <td>{new Date(service.updated_at).toLocaleString('vi-vn')}</td>
                          <td>{service.name}</td>
                          <td>{service.description}</td>
                          <td>{parseInt(service.cost).toLocaleString('vi-vn', currencyOptions)}</td>

                          <td>
                            <button type="button"
                                    className="btn btn-warning"
                                    data-index={service.id}
                                    onClick={this.showEditForm}
                            >
                              Chỉnh sửa
                            </button>
                          </td>
                          <td>
                            <button type="button"
                                    className="btn btn-danger"
                                    data-index={service.id}
                                    onClick={this.removeService}
                            >
                              Xóa
                            </button>
                          </td>
                        </tr>
                      )}
                      </tbody>
                    </table>
                  )}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}
