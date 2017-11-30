import Vue from 'vue';
import 'element-ui/lib/theme-chalk/index.css';
import {
	Row,
	Col,
	Input,
	Form,
	Button,
	FormItem,
	MessageBox,
  	Message,
  	Radio,
  	RadioGroup,
  	Loading
} from 'element-ui';
Vue.use(Row);
Vue.use(Col);
Vue.use(Input);
Vue.use(Form);
Vue.use(Button);
Vue.use(FormItem);
Vue.use(Radio);
Vue.use(RadioGroup);
Vue.use(Loading);
Vue.prototype.$msgbox = MessageBox;
Vue.prototype.$alert = MessageBox.alert;
export default {
	
}