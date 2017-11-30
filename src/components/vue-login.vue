<template>
	<div id="login">
		<el-row class="title">
			<el-col>{{title}}<br/>
				<small>{{grade}}</small>
			</el-col>
		</el-row>
		<el-row>
			<el-col :span="12" :offset="6" class="login">
				<el-form :model="info" :rules="rules" :label-position="labelPosition" ref="info" label-width="80px">
					<el-form-item label="姓名：" prop="username">
						<el-input
							autofocus 
							v-model="info.username"
							type="text" 
							placeholder="请输入您的姓名~">
						</el-input>
					</el-form-item>
					<el-form-item label="学号：" prop="studentid">
						<el-input 
							v-model="info.studentid" 
							type="text" 
							placeholder="请输入您的学号~">
						</el-input>
					</el-form-item>
					<el-form-item>
						<el-button type="primary" round @click="onSubmit('info')">立即登录</el-button>
					</el-form-item>
				</el-form>
			</el-col>
		</el-row>
	</div>
</template>
<script>
	export default {
		name: "vue-login",
		data() {
			return {
				title: "名著阅读知识竞赛",
				grade: "2015级市场2班第一组",
				labelPosition: "top",
				loginUrl: "http://www.boyalibrary.com/literature/server/Server.php",
				info: {
					username: "",
					studentid: ""
				},
				rules: {
					username: [
						{ required: true, message: '请输入您的姓名~', trigger: 'blur' },
           				{ min: 2, max: 3, message: '姓名长度在 2 到 3 个字符', trigger: 'blur' }
					],
					studentid: [
						{required: true, message: "请输入您的学号~", trigger: "blur"},
						{min: 8, max: 8, message: "学号长度为 8 个字符", trigger: "blur"}
					]
				}
			}
		},
		methods: {
			messageAlert(title, msg) {
				this.$alert(msg, title, {
		      		confirmButtonText: '确定',
		        });
			},
			onSubmit(info) {
				this.$refs[info].validate((valid) => {
					let options = {
						action: "login",
						username: this.info.username,
						studentid: this.info.studentid
					};
					if(valid) {
						this.$http.post(this.loginUrl, options).then(response => {
							if(response.body.errCode === 0) {
								//设置用户的userid
								localStorage.setItem("userid",response.body.data);
								this.$emit('showIndexPage');
							}else{
								this.messageAlert('提示', response.body.data);
							}
						}, response => {
							this.messageAlert('警告','出现异常');
						});
					}else {
						return false;
					}
		        });
			}
		}
	}
</script>
<style lang="less">
	@import '../assets/css/public.css';
	#login {
		margin-top: 100px;
	}
</style>