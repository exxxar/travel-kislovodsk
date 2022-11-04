<template>
    <main class="container">
        <div class="main row d-flex justify-content-center">
            <div class="row col-11 col-md-10 col-lg-8 align-self-center mx-0 px-0">
                <h3 class="col-12 px-0 mb-5 opacity-40 letter-spasing-3 text-uppercase">главная <span
                    class="fs-6 opacity-40">&gt;</span>
                    faq</h3>
                <h1 class="col-12 px-0 mb-4 bold fs-1">Часто задаваемые вопросы</h1>
                <p class="col-12 px-0 mb-4 thin font-size-09">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis ad exercitationem laborum
                    consequuntur blanditiis quae excepturi nisi voluptas ea quibusdam sunt ipsam amet dignissimos, quam
                    tempora dolor, soluta magni labore vitae dolores eius natus. Iure eos unde saepe dolores inventore,
                    blanditiis quasi culpa numquam, nesciunt laudantium natus alias sit voluptatem. Natus odit, facilis
                    quibusdam numquam autem vero alias minus libero ad magni nobis architecto recusandae commodi
                    suscipit exercitationem tenetur reprehenderit amet totam dolorum distinctio minima ullam veniam
                    saepe! At dolores voluptatem nam rem et ea dolore exercitationem temporibus soluta quisquam, ducimus
                    repudiandae! Optio dolor temporibus, consectetur eos exercitationem hic reiciendis!
                </p>
                <div class="accordion row mx-0 mb-6 gap-2 px-0" id="accordionQuestions">
                    <div class="accordion__item bg-white rounded bg-white rounded"
                         v-for="(question) in questions" :key="question"
                         :class="{'visible': question.id === this.selectedQuestionId}">
                        <div
                            class="accordion__head ps-4 pe-3 py-3 row align-items-center justify-content-between"
                            id="heading-1">
                            <span class="col bold font-size-09">{{ question.title }}</span>
                            <button @click=setSelectedQuestion(question.id)
                                    data-bs-toggle="collapse" :data-bs-target="'#collapse-' + question.id"
                                    aria-expanded="true" :aria-controls="'collapse-' + question.id"
                                    class="round-icon bg-light-blue rounded align-items-center d-flex justify-content-center px-0">
                                <svg class="" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" height="24"
                                     width="24">
                                    <path d="M22 38.5V26H9.5v-4H22V9.5h4V22h12.5v4H26v12.5Z"/>
                                </svg>
                            </button>
                        </div>
                        <div :id="'collapse-' + question.id" class="accordion-collapse collapse"
                             :class="{'show': question.id == 0}"
                             data-bs-parent="#accordionQuestions" :aria-labelledby="'heading-' + question.id">
                            <div
                                class="accordion__content-item row px-4 pb-3 align-items-center justify-content-between">
                                <p class="thin font-size-09">
                                    {{ question.answer }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 bg-image p-3 rounded">
                    <div
                        class="row col-12 px-5 py-2rem mx-0 bg-light d-flex justify-content-between align-items-center">
                        <div class="col-12 col-lg-6 row px-0 mx-0">
                            <span class="col-12 px-0 bold fs-5">Остались вопросы?</span>
                            <span class="col-12 px-0 mt-2 thin font-size-09">Вы можете пообщаться, задать их через
                                специальнуюформу, и мы обязательно ответим на любой ваш вопрос.</span>
                        </div>
                        <button
                            class="big-button col-12 col-lg-auto px-5 mt-3 mt-lg-0 rounded bg-blue bold font-size-09">
                            Задать вопрос
                        </button>
                    </div>
                </div>
            </div>
            <benefits-component/>
        </div>
    </main>
</template>
<script>
export default {
    data() {
        return {
            questions: [{
                id: 0,
                title: "Какой-то вопрос?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 1,
                title: "Каким способом происходит оплата?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 2,
                title: "Что делать, если что-то случилось?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non " +
                    "beatae eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, " +
                    "rerum hic, magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 3,
                title: "Если передумали, куда обращаться?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 4,
                title: "Какой-то вопрос?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 5,
                title: "Каким способом происходит оплата?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 6,
                title: "Что делать, если что-то случилось?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non " +
                    "beatae eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum " +
                    "hic, magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }, {
                id: 7,
                title: "Если передумали, куда обращаться?",
                answer: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione veritatis aliquam numquam " +
                    "obcaecati delectus dolor asperiores eos natus ea! Nobis quasi animi beatae nam neque ipsum " +
                    "eligendi quae accusamus, at necessitatibus! Nihil nobis culpa perspiciatis itaque sed non beatae " +
                    "eos iure ipsum molestias totam voluptatem autem dignissimos corrupti fuga earum, rerum hic, " +
                    "magnam illo saepe? Voluptas quod dignissimos ducimus perferendis!"
            }], selectedQuestionId: null
        }
    },
    methods: {
        setSelectedQuestion(questionId) {
            this.selectedQuestionId = questionId;
        }
    }
}
</script>
