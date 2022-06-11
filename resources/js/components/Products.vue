<template>
    <div>
        <v-container>
            <v-data-table
                :headers="headers"
                :items="prods"
                sort-by="name"
                class="elevation-1"
                :search="search"
            >
                <template v-slot:top>
                    <v-toolbar flat>
                        <v-toolbar-title>Productos</v-toolbar-title>
                        <v-divider class="mx-4" inset vertical></v-divider>
                        <v-spacer></v-spacer>
                        <v-dialog v-model="dialog" max-width="500px">
                            <v-spacer></v-spacer>
                            <template v-slot:activator="{ on, attrs }">
                                <v-btn
                                    color="primary"
                                    dark
                                    class="mb-2"
                                    v-bind="attrs"
                                    v-on="on"
                                >
                                    Nuevo Producto
                                </v-btn>
                                <v-spacer></v-spacer>
                                <v-text-field
                                    v-model="search"
                                    append-icon="mdi-magnify"
                                    label="Buscar"
                                    single-line
                                    hide-details
                                ></v-text-field>
                            </template>
                            <v-card>
                                <v-card-title>
                                    <span class="text-h5">{{ formTitle }}</span>
                                </v-card-title>

                                <v-card-text>
                                    <v-container>
                                        <v-row>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field
                                                    v-model="editedItem.name"
                                                    label="Nombre"
                                                    :rules="rules.name"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field
                                                    v-model="editedItem.desc"
                                                    label="Descripción"
                                                    :rules="rules.desc"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field
                                                    v-model="editedItem.price"
                                                    label="Precio ($)"
                                                    :rules="rules.price"
                                                    type="number"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field
                                                    v-model="editedItem.stock"
                                                    :rules="rules.stock"
                                                    label="Existencias"
                                                    type="number"
                                                ></v-text-field>
                                            </v-col>
                                            <v-col cols="12" sm="6" md="6">
                                                <v-text-field
                                                    v-model="
                                                        editedItem.warranty
                                                    "
                                                    label="Garantía"
                                                    :rules="rules.warranty"
                                                    type="month"
                                                ></v-text-field>
                                            </v-col>
                                        </v-row>
                                    </v-container>
                                </v-card-text>

                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn @click="close"> Cancelar </v-btn>
                                    <v-btn
                                        color="#15CD72"
                                        @click="save"
                                        style="color: white"
                                    >
                                        Guardar
                                    </v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                        <v-dialog v-model="dialogDelete" max-width="500px">
                            <v-card>
                                <v-card-title class="text-h5 text-center">
                                    <v-spacer></v-spacer>
                                    <v-icon color="#ED4F32" x-large>
                                        mdi-delete</v-icon
                                    >
                                    <v-spacer></v-spacer>Desea borrar este
                                    producto?</v-card-title
                                >
                                <v-card-actions>
                                    <v-spacer></v-spacer>
                                    <v-btn @click="closeDelete">Cancelar</v-btn>
                                    <v-btn
                                        color="#ED4F32"
                                        style="color: white"
                                        @click="deleteItemConfirm"
                                        >Borrar</v-btn
                                    >
                                    <v-spacer></v-spacer>
                                </v-card-actions>
                            </v-card>
                        </v-dialog>
                    </v-toolbar>
                </template>
                <template v-slot:item.actions="{ item }">
                    <v-icon
                        large
                        color="#EDE04D"
                        class="mr-2"
                        @click="editItem(item)"
                    >
                        mdi-pencil
                    </v-icon>
                    <v-icon large color="#ED4F32" @click="deleteItem(item)">
                        mdi-delete
                    </v-icon>
                </template>
                <template v-slot:no-data>
                    <v-btn color="primary" @click="initialize"> Reset </v-btn>
                </template>
            </v-data-table>
        </v-container>
    </div>
</template>

<script>
import axios from "axios";
export default {
    props: ["products", "type_user"],
    data: () => ({
        search: "",
        dialog: false,
        dialogDelete: false,
        headers: [
            { text: "ID", align: "start", value: "id", sortable: false },
            {
                text: "Nombre",
                align: "center",
                value: "name",
            },
            { text: "Descripcion", value: "desc" },
            { text: "Precio Unitario", value: "price" },
            { text: "Existencia", value: "stock" },
            { text: "Garantia", value: "warranty" },
        ],
        prods: [],
        editedIndex: -1,
        editedItem: {
            id: "",
            name: "",
            desc: "",
            price: "",
            stock: 0,
            warranty: "",
        },
        defaultItem: {
            id: "",
            name: "",
            desc: "",
            price: "",
            stock: 0,
            warranty: "",
        },
        rules: {
            name: [(v) => !!v || "Valor requerido"],
            desc: [(v) => !!v || "Valor requerido"],
            price: [(v) => !!v || "Valor requerido"],
            stock: [(v) => !!v || "Valor requerido"],
            warranty: [(v) => !!v || "Valor requerido"],
        },
    }),

    computed: {
        formTitle() {
            return this.editedIndex === -1
                ? "Nuevo Producto"
                : "Editar Producto";
        },
    },

    watch: {
        dialog(val) {
            val || this.close();
        },
        dialogDelete(val) {
            val || this.closeDelete();
        },
    },

    created() {
        this.initialize();
    },

    methods: {
        initialize() {
            console.log(this.products);
            this.type_user == "seller"
                ? this.headers.push({
                      text: "Acciones",
                      value: "actions",
                      sortable: false,
                  })
                : "",
                this.products.map((p) => {
                    this.prods.push({
                        id: p.id,
                        name: p.name,
                        desc: p.description,
                        price: p.unitPrice,
                        stock: p.existence,
                        warranty: p.warranty,
                    });
                });
        },

        editItem(item) {
            console.log(item);
            this.editedIndex = this.prods.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialog = true;
        },

        deleteItem(item) {
            this.editedIndex = this.prods.indexOf(item);
            this.editedItem = Object.assign({}, item);
            this.dialogDelete = true;
        },

        deleteItemConfirm() {
            axios
                .post("http://localhost:3000/seller/destroy", this.editedItem)
                .then((r) => {
                    console.log(r);
                    this.prods.splice(this.editedIndex, 1);
                    this.closeDelete();
                })
                .catch((e) => {
                    console.log(e);
                });
        },

        close() {
            this.dialog = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        closeDelete() {
            this.dialogDelete = false;
            this.$nextTick(() => {
                this.editedItem = Object.assign({}, this.defaultItem);
                this.editedIndex = -1;
            });
        },

        save() {
            if (this.validator()) {
                if (this.editedIndex > -1) {
                    axios
                        .post(
                            "http://localhost:3000/seller/update",
                            this.editedItem
                        )
                        .then((r) => {
                            console.log(r);
                            this.editedItem.id = r.data.id;
                            this.editedItem.name = r.data.name;
                            this.editedItem.warranty = r.data.warranty;
                            this.editedItem.price = r.data.unitPrice;
                            this.editedItem.desc = r.data.description;
                        })
                        .catch((e) => {
                            console.log(e);
                        });
                    Object.assign(
                        this.prods[this.editedIndex],
                        this.editedItem
                    );
                } else {
                    axios
                        .post(
                            "http://localhost:3000/seller/add",
                            this.editedItem
                        )
                        .then((r) => {
                            console.log(r);
                            this.editedItem.id = r.data.id;
                            this.editedItem.name = r.data.name;
                            this.editedItem.warranty = r.data.warranty;
                            this.editedItem.price = r.data.unitPrice;
                            this.editedItem.desc = r.data.description;
                            this.prods.push(this.editedItem);
                        })
                        .catch((e) => {
                            console.log(e);
                        });
                }
                this.close();
            }
        },
        validator() {
            let it = this.editedItem;
            if (
                it.name != "" ||
                it.desc != "" ||
                it.price != "" ||
                it.stock != "" ||
                it.warranty != ""
            ) {
                return true;
            } else {
                return false;
            }
        },
    },
};
</script>

<style></style>
