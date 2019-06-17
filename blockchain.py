# module1 - Create a blockchain


import datetime
import hashlib
import json
from flask import Flask,jsonify

#Part 1 - Building Blockchain


class Blockchain:
    
    def __init__(self):
        self.chain = []
        self.create_block(proof = 1,previous_hash="0")
        
    def create_block(self , proof , previous_hash ):
        block = {"index" : len(self.chain)+1,
                 'timestamp' : str(datetime.datetime.now()),
                 'proof' : proof,
                 'previous_hash' : previous_hash } 
        self.chain.append(block)
        return block
    
    def get_prev_block(self):
        return self.chain[-1]
    
# Proof 0f work
        def proof_of_work(self,previous_proof):
            new_proof = 1
            flag = False
            while(flag == False):
                hash_operation = hashlib.sha256(str(new_proof**2-previous_proof**2).encode()).hexdigest()
                if hash_operation[:4] == "0000":
                    flag =True
                else :
                    new_proof +=1
                    
            return new_proof
        
        
        def hash(self, block):
            encoded_block = json.dumps(block,sort_keys = True).encode()
            return hashlib.sha256(encoded_block).hexdigest()
            
        def is_chain_valid(self, chain):
             previous_block = chain[0]
             block_index = 1
             while(block_index < len(chain)):
                 block = chain[block_index]
                 if(block['previous_hash'] != self.hash(previous_block) ):
                     return False
                 return True