import React, {useState} from 'react';
import { Text , View, Image, TextInput, ScrollView, StyleSheet, KeyboardAvoidingView, TouchableOpacity, Keyboard} from 'react-native';

export default function Cad_us () {

    const [nome, setNome] = useState('');
    const [cpf, setCpf] = useState('');
    const [rg, setRg] = useState('');
    const [telefone, setTelefone] = useState('');
    const [email, setEmail] = useState('');
    const [cidade, setCidade] = useState('');
    const [cep, setCep] = useState('');
    const [bairro, setBairro] = useState('');
    const [complemento, setComplemento] = useState('');
    const [senha, setSenha] = useState('');
    const [confirmarSenha, setConfirmarSenha] = useState(''); 

    const cadastro = () => {
        alert('Funcionando');
    }
  

    return (
        <ScrollView>
        <KeyboardAvoidingView style={styles.background}> 

        <Text style={styles.title}>Cadastre-se</Text>
    
            <TextInput
             style={styles.input}
                placeholder="Nome"
                autoCorrect={false}
                onChangeText={text=>setNome(text)}
            />
               <TextInput
             style={styles.input}
                placeholder="Email"
                autoCorrect={false}
                onChangeText={text=>setEmail(text)}
            />
               <TextInput
             style={styles.input}
                placeholder="Telefone"
                autoCorrect={false}
                onChangeText={text=>setTelefone(text)}
            />

            <View style={styles.div}>
            <TextInput
             style={styles.input2 }
                placeholder="CPF"
                autoCorrect={false}
                onChangeText={text=>setCpf(text)}
            />
            <TextInput
            style={styles.input2}
               placeholder="RG"
               autoCorrect={false}
               onChangeText={text=>setRg(text)}
           />
            </View>

            <TextInput
             style={styles.input }
                placeholder="Cidade"
                autoCorrect={false}
                onChangeText={text=>setCidade(text)}
            />

            <View style={styles.div}>
            <TextInput
            style={styles.input2}
               placeholder="CEP"
               autoCorrect={false}
               onChangeText={text=>setCep(text)}
           />
            <TextInput
             style={styles.input2 }
                placeholder="Bairro"
                autoCorrect={false}
                onChangeText={text=>setBairro(text)}
            />
            </View>
           
            <TextInput
            style={styles.input}
               placeholder="Complemento"
               autoCorrect={false}
               onChangeText={text=>setComplemento(text)}
           />


            <TextInput
             style={styles.input}
                secureTextEntry={true}
                placeholder="Senha"
                autoCorrect={false}
                onChangeText={text=>setSenha(text)}
            />
           <TextInput
             style={styles.input}
                secureTextEntry={true}
                placeholder="Confirmar Senha"
                autoCorrect={false}
                onChangeText={text=>setConfirmarSenha(text)}
            />
         
           

            <TouchableOpacity onPress={()=>cadastro()} style={styles.btnSubmit}>
                <Text syle={styles.submitText}>Cadastrar</Text>
            </TouchableOpacity>
            </KeyboardAvoidingView>

            </ScrollView>
    );
}

const styles = StyleSheet.create({
   background:{
        flex: 1,
        alignItems: 'center',
        justifyContent: 'center',
        backgroundColor: '#FFF'
    }, 
  container:{
        flex: 1,
        backgroundColor: '#fff',
        alignItems: 'center',
        justifyContent: 'center'
    },
    input:{
        backgroundColor: '#dcdcdc',
        width: '90%',
        marginBottom: 15,
        color: '#17a2b8',
        fontSize: 17,
        borderRadius: 7,
        borderColor: "#000",
        padding: 10
    },
    input2:{
        backgroundColor: '#dcdcdc',
        width: '43%',
        marginBottom: 15,
        color: '#17a2b8',
        fontSize: 17,
        borderRadius: 7,
        borderColor: "#000",
        padding: 10,
        marginHorizontal: '2%'
    },
    btnSubmit:{
        backgroundColor: '#17a2b8',
        width: '90%',
        height: 45,
        alignItems: 'center',
        justifyContent: 'center',
        borderRadius: 7,
        marginBottom: '20%',
        marginTop: '10%',
    },
    submitText:{
        color: '#17a2b8',
        fontSize: 18
    },
    div:{
        flexDirection: 'row',
        justifyContent: 'space-around',
    },
    title:{
        fontSize: 30,
        padding: 30,
        fontWeight: 'bold',
        marginVertical: 10,
        color: '#17a2b8'

    }

});