<template>
	<div v-loading="loading" element-loading-text="正在出题中...">
		<el-row class="title">
			<el-col :span="18" :offset="3">剩余时间:{{minute2}} : {{seconds2}}</el-col>
		</el-row>
		<div v-for="(item,index) in questiones" :key="index" class="exam-question">
			<el-row>
				<el-col :span="18" :offset="3">
					<div class="question">{{index+1}}. {{item.problem}}</div>
					<el-radio-group v-model="item.choice" :disabled="item.finish">
						<el-radio :label="'A'" class="option">{{item.optionA}}</el-radio>
						<el-radio :label="'B'" class="option">{{item.optionB}}</el-radio>
						<el-radio :label="'C'" class="option">{{item.optionC}}</el-radio>
						<el-radio :label="'D'" class="option">{{item.optionD}}</el-radio>
					</el-radio-group>
				</el-col>
			</el-row>
			<el-row class="answer">
				<el-col :span="18" :offset="3">
					<el-button class="submit-btn" @click="getResult(index)" :disabled="item.finish">提交</el-button>
				</el-col>
			</el-row>
			<el-row class="answer" v-if="item.finish">
				<el-col :span="18" :offset="3">
					<div class="right" v-if="item.answer === item.choice">恭喜您回答正确</div>
					<div class="false" v-if="item.answer !== item.choice">回答错误，正确答案为{{item.answer}}</div>
				</el-col>
			</el-row>
		</div>
	</div>
</template>

<script>
	export default {
		name: "vue-index",
		data() {
			return {
				minute: 20,
				seconds: 0,
				answer: 0,
				timer: null,
				rightNumber: 0,
				totalNumber: 0,
				loading: true,
				questionUrl: "http://www.boyalibrary.com/literature/server/Server.php",
				questiones: [
					
				]
			}
		},
		methods: {
			//弹窗函数
			messageAlert(title, msg) {
				this.$alert(msg, title, {
		      		confirmButtonText: '确定',
		        });
			},
			//提交分数
			postScore() {
				var totalScore = this.rightNumber * 2;
				let userid = localStorage.getItem("userid");
				localStorage.setItem("userid", 0);
				// 提交成绩进入数据库
				let options = {action: "postScore", score: totalScore, userid: userid};
				this.$http.post(this.questionUrl, options).then(response => {
					if(response.body.errCode === 0) {
						this.messageAlert("提示", "您已经完成所有题目,总分为"+totalScore);
					}else{
						this.messageAlert('提示',response.body.data);
					}
				}, response => {
					this.messageAlert('警告','出现异常');
				});
			},
			//作业提交函数
			getResult(index) {
				this.questiones[index].finish = true;
				if(this.questiones[index].choice === this.questiones[index].answer) {
					this.rightNumber++;
				}
				this.totalNumber++;
				//如果答题完成,或者时间截止就提交成绩
				if(this.totalNumber === this.questiones.length) {
					this.postScore();
					clearInterval(this.timer);
				}
			}
		},
		computed: {
			//显示在页面的秒数
			seconds2() {
				return this.seconds < 10 ? "0"+this.seconds : this.seconds;
			},
			//显示在页面的分钟数
			minute2() {
				return this.minute < 10 ? "0"+this.minute : this.minute;
			}
		},
		mounted() {
			// 获取题目
			let options = {action: "getQuestion"};
			this.$http.post(this.questionUrl, options).then(response => {
				if(response.body.errCode === 0) {
					let result = response.body.data;
					result.map((item, index, array) => {
	        			result[index].choice = "";
	        			result[index].finish = false;
		        	});
		        	this.questiones = result;
					//关闭正在加载遮罩层
					this.loading = false;
					// 定时器
					var _this = this;
					this.timer = setInterval(function() {
						if(_this.minute === 0 && _this.seconds === 0) {
							clearInterval(_this.timer);
							_this.questiones.map((item, index, array) => {
								_this.questiones[index].finish = true;
							});
							_this.postScore();
							return;
						}
						if(_this.seconds === 0) {
							_this.minute--;
							_this.seconds = 59;
						}else{
							_this.seconds--;
						}
					},1000);
				}else{
					this.messageAlert('提示',response.body.data);
				}
			}, response => {
				this.messageAlert('警告','出现异常');
			});
		}
	}
</script>
<style lang="less">
	@import '../assets/css/public.css';
	.exam-question {
		user-select:none;
		margin-top: 35px;
		.option {
			display: block;
			position: relative;
			margin-top: 12px;
			left: -30px;
		}
		.option:first-child {
			left: 0;
		}
		.question {
			margin-bottom: 10px;
		}
		.answer {
			margin-top: 10px;
			font-size: 14px;
			.right {
				color: #67C23A;
			}
			.false {
				color: #FA5555;
			}
		}
		.submit-btn {
			height: 30px;
			line-height: 2px;
		}
	}
</style>