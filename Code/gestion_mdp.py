import hashlib, hmac

# la clé secrète est : "Airbus"

cle = bytes('Airbus', 'utf-8')

def hacher(mdp):
    hash = hmac.new(cle, bytes(mdp, 'utf-8'), hashlib.sha256)
    return hash.hexdigest()

